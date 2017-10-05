'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync').create();
var cssmin = require('gulp-cssmin');
var uncss = require('gulp-uncss');
var stripCssComments = require('gulp-strip-css-comments');
var uglify = require('gulp-uglify');
var livereload = require('gulp-livereload')
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var bourbon = require('bourbon').includePaths;
var neat = require('bourbon-neat').includePaths;
var svgSprite = require("gulp-svg-sprites");


var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};
var sassOptions = {
  errLogToConsole: true
}


//Uglifies javascript
gulp.task('jsprod', function() {
  return gulp.src('js/source/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('js/build'));
});

//Uglifies javascript
gulp.task('jsdev', function() {
  return gulp.src('js/source/*.js')
    //.pipe(uglify())
    .pipe(gulp.dest('js/build'));
});



gulp.task('sprites', function () {
  return gulp.src('assets/svg/*.svg')
    .pipe(svgSprite({mode: "symbols"}))
    .pipe(gulp.dest("assets"));
});

//Compiles sass
gulp.task('sassdev', function () {
  gulp.src('./sass/**/*.scss')
    .pipe(sass({
          includePaths: ['sass'].concat(bourbon,neat)
      }))
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(stripCssComments({preserve: false}))
    .pipe(cssmin())
    .pipe(autoprefixer(autoprefixerOptions))
    //.pipe(sourcemaps.write('.'))
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./css'));
});

//Compiles sass
gulp.task('sassprod', function () {
  gulp.src('./sass/**/*.scss')
    .pipe(sass({
      includePaths: ['sass'].concat(bourbon,neat)
    }))
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(stripCssComments({preserve: false}))
    .pipe(cssmin())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(concat('style.min.css'))
    .pipe(gulp.dest('./css'));
});

gulp.task('images', () =>
    gulp.src('images/source/*')
      .pipe(imagemin())
      .pipe(gulp.dest('images/'))
);

//Type "gulp" on the command line to watch file changes
gulp.task('default', function(){
  livereload.listen();
    gulp.watch('./images/source/', ['images']);
    gulp.watch('./sass/**/*.scss', ['sassdev']);
    gulp.watch('./js/source/*.js', ['jsdev']);
    gulp.watch(['./css/style.css', './**/*.twig', './js_min/*.js'], function (files){
      livereload.changed(files)
    });
});

//Type "gulp" on the command line to compile file changes
gulp.task('prod', [ 'sassprod', 'jsprod' ]);