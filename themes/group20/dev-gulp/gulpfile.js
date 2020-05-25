

// insert the location of your local server in the variable below

var server_location = 'http://one.wordpress.test/';

var gulp = require( 'gulp' ),
    autoprefixer = require( 'gulp-autoprefixer' ),
    browserSync  = require( 'browser-sync' ).create(),
    reload  = browserSync.reload,
    sass  = require( 'gulp-sass' ),
    cleanCSS  = require( 'gulp-clean-css' ),
    sourcemaps  = require( 'gulp-sourcemaps' ),
    concat  = require( 'gulp-concat' ),
    changed = require( 'gulp-changed' ),
    uglify  = require( 'gulp-uglify' ),
    lineec  = require( 'gulp-line-ending-corrector' )
    cache = require('gulp-cache');

    var root  = '../',
    scss  = root + 'sass/',
    js  = root + 'src/js/',
    jsdist  = root + 'dist/js/';

// Watch Files
var PHPWatchFiles  = root + '**/*.php',
    styleWatchFiles  = root + '**/*.scss';

// Used to concat the files in a specific order.
var jsSRC = [
    js + 'customizer.js',
    js + 'navigation.js',
    js + 'skip-link-focus-fix.js',
    js + 'hamburger-menu.js'
];

// Used to concat the files in a specific order.
var cssSRC =  [
  root + 'style.css'
];

function css() {
  return gulp.src([scss + 'style.scss'])
  .pipe(sourcemaps.init({loadMaps: true}))
  .pipe(sass({
    outputStyle: 'expanded'
  }).on('error', sass.logError))
  .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(lineec())
  .pipe(gulp.dest(root));
}

function concatCSS() {
  return gulp.src(cssSRC)
  .pipe(sourcemaps.init({loadMaps: true, largeFile: true}))
  .pipe(concat('style.min.css'))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write('./maps/'))
  .pipe(lineec())
  .pipe(gulp.dest(scss));
}

function javascript() {
  return gulp.src(jsSRC)
  .pipe(concat('group20.js'))
  .pipe(uglify())
  .pipe(lineec())
  .pipe(gulp.dest(jsdist));
}

function watch() {
  browserSync.init({
    open: 'external',
    proxy: server_location,
    port: 8080,
    reloadDelay: 1000
  });

  gulp.watch(styleWatchFiles, gulp.series([css, concatCSS]));
  gulp.watch(jsSRC, javascript);
  gulp.watch([PHPWatchFiles, jsdist + 'group20.js', scss + 'style.min.css', scss]).on('change', reload);
}

exports.css = css;
exports.concatCSS = concatCSS;
exports.javascript = javascript;
exports.watch = watch;

var build = gulp.parallel(watch);
gulp.task('default', build);