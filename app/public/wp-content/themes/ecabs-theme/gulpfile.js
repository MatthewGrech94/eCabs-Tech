const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify');

const paths = {
  themeStyles: {
    src: 'src/scss/style.scss',
    dest: './'
  },
  pageStyles: {
    src: 'src/scss/pages/*.scss',
    dest: './css'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'js/'
  },
  php: './**/*.php'
};

// Compile themeStyles into CSS & auto-inject into browsers
function themeStyles() {
  return gulp.src(paths.themeStyles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.themeStyles.dest))
    .pipe(browserSync.stream());
}

function pageStyles() {
  return gulp.src(paths.pageStyles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.pageStyles.dest))
    .pipe(browserSync.stream());
}

// Minify JS (optional)
function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(browserSync.stream());
}

// Static server + watching scss/php/js files
function serve() {
  browserSync.init({
    proxy: "http://ecabs.local/", // Change to local WP URL
    notify: false
  });

  gulp.watch(paths.themeStyles.src, themeStyles);
  gulp.watch(paths.pageStyles.src, pageStyles);
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch(paths.php).on('change', browserSync.reload);
}

const build = gulp.series(gulp.parallel(themeStyles, pageStyles, scripts), serve);

exports.themeStyles = themeStyles;
exports.pageStyles = pageStyles;
exports.scripts = scripts;
exports.serve = serve;
exports.default = build;
