var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    //eslint = require('gulp-eslint'),
    //uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

gulp.task('sass', function () {
    return gulp.src('resources/assets/sass/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('resources/assets/css'))

});

gulp.task('css', ['sass'], function () {
    return gulp.src([
            'resources/assets/css/**/*',
            'resources/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'
        ])
        .pipe(cssnano())
        .pipe(concat('app.css'))
        .pipe(gulp.dest('public/assets/css/'));
});