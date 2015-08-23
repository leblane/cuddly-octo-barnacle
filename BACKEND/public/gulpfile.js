var gulp = require('gulp');
var concat = require('gulp-concat');
var watch = require('gulp-watch');
var batch = require('gulp-batch');

gulp.task('scripts', function() {
  return gulp.src('./source/*.js')
    .pipe(concat('app.js'))
    .pipe(gulp.dest('./js/'));
});

gulp.task('watch', function () {
    gulp.start('scripts');

    watch('./source/*.js', batch(function(events, done) {
        gulp.start('scripts');
    }));
});
