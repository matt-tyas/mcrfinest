var gulp = require('gulp');
// var scsslint = require('gulp-scss-lint');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var include = require('gulp-include');
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');
var uglify = require('gulp-uglify');
var mocha = require('gulp-mocha');
// var purge = require('gulp-css-purge');


/**
 * Settings
 */
var src = '';
var dest = '';

var src_paths = {
  styles: src + 'inuit.css/**/*.scss',
  scripts: src + 'js/package/**/*.js'
};

var dest_paths = {
  styles: dest + '',
  scripts: dest + 'js/package-min'
};

var settings = {
  sass: {
    outputStyle: 'compressed'
  },
  autoprefixer: {
    browsers: ['> 5%', 'last 2 versions']
  }
};



/**
 * Lint tasks
 */
gulp.task('lintjs', function() {
  gulp.src(src_paths.scripts)
    .pipe(jshint())
    .pipe(jshint.reporter(stylish));
});

// gulp.task('lintscss', function() {
//   gulp.src(src_paths.styles)
//     .pipe(scsslint());
// });


/**
 * Build tasks
 */


// Styles
gulp.task('css', function() {
  gulp.src(src_paths.styles)
    .pipe(sourcemaps.init())
      .pipe(sass(settings.sass))
      .on('error', sass.logError)
      .pipe(autoprefixer(settings.autoprefixer))
      // .pipe(purge())
    .pipe(sourcemaps.write('maps/'))
    .pipe(gulp.dest(dest_paths.styles))
});

// Scripts
gulp.task('js', ['lintjs'], function() {
  gulp.src(src_paths.scripts)
    .pipe(sourcemaps.init())
      .pipe(include())
      .pipe(concat('main.js'))
      .pipe(uglify())
    .pipe(sourcemaps.write('maps/'))
    .pipe(gulp.dest(dest_paths.scripts))
});


/**
 * Tests
 */
gulp.task('testjs', function() {
  gulp.src('test.js')
    .pipe(mocha());
});



/**
 * Watch tasks
 */
gulp.task('watch', function() {
  gulp.watch(src_paths.styles, ['css']);
  gulp.watch(src_paths.scripts, ['lintjs', 'js']);
});


/**
 * Run tasks
 */
gulp.task('test', ['testjs']);
gulp.task('build', ['css', 'js']);
gulp.task('server', ['build', 'watch']);

gulp.task('default', ['server']);
