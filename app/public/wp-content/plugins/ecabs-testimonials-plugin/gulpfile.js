const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify');

const paths = {
  customStyles: {
    src: 'src/scss/**/*.scss',
    dest: './css'
  },
  thirdPartyStyles: {
    src: ['node_modules/owl.carousel/dist/assets/owl.carousel.min.css'],
    dest: './css/third-party/'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'js/'
  },
  thirdPartyScripts: {
    src: ['node_modules/owl.carousel/dist/owl.carousel.min.js'],
    dest: 'js/third-party/'
  },
  php: './**/*.php'
};


function customStyles() {
  return gulp.src(paths.customStyles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.customStyles.dest))
    .pipe(browserSync.stream());
}

function thirdPartyStyles() {
  return gulp.src(paths.thirdPartyStyles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.thirdPartyStyles.dest))
    .pipe(browserSync.stream());
}

// Minify JS
function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(browserSync.stream());
}

function thirdPartyScripts() {
  return gulp.src(paths.thirdPartyScripts.src)
    .pipe(uglify())
    .pipe(gulp.dest(paths.thirdPartyScripts.dest))
    .pipe(browserSync.stream());
}

// Static server + watching scss/php/js files
function serve() {
  browserSync.init({
    proxy: "http://ecabs.local/", // Change to local WP URL
    notify: false
  });

  gulp.watch(['src/scss/**/*.scss'], customStyles);
  gulp.watch(paths.thirdPartyStyles.src, thirdPartyStyles);
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch(paths.thirdPartyScripts.src, thirdPartyScripts);
  gulp.watch(paths.php).on('change', browserSync.reload);
}

const build = gulp.series(gulp.parallel(customStyles, thirdPartyStyles, scripts, thirdPartyScripts), serve);

exports.customStyles = customStyles;
exports.thirdPartyStyles = thirdPartyStyles;
exports.scripts = scripts;
exports.thirdPartyScripts = thirdPartyScripts;
exports.serve = serve;
exports.default = build;
