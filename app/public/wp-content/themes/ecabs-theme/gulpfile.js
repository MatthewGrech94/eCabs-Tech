const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify');

const paths = {
  styles: {
    src: 'src/scss/style.scss',   // your scss source
    dest: './'                   // destination, root because WordPress expects style.css here
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'js/'
  },
  php: './**/*.php'
};

// Compile SCSS into CSS & auto-inject into browsers
function styles() {
  return gulp.src(paths.styles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.styles.dest))
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
    proxy: "http://ecabs.local/", // Change to your local WP URL
    notify: false
  });

  gulp.watch(paths.styles.src, styles);
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch(paths.php).on('change', browserSync.reload);
}

const build = gulp.series(gulp.parallel(styles, scripts), serve);

exports.styles = styles;
exports.scripts = scripts;
exports.serve = serve;
exports.default = build;
