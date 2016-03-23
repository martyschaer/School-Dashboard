var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    eslint = require('gulp-eslint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

/**
 * This task transpiles each sass file to css.
 */
gulp.task('sass', function () {
    return gulp.src('resources/assets/sass/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('resources/assets/css'));

});

/**
 * This task minifies and concatenates all css files. Prior to this the
 * sass task gets called.
 */
gulp.task('css', ['sass'], function () {
    return gulp.src([
            'resources/assets/css/**/*',
            'resources/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'
        ])
        .pipe(cssnano())
        .pipe(concat('app.css'))
        .pipe(gulp.dest('public/assets/css/'));
});

/**
 * This task lints all javascript files for errors. The defined linting rules
 * can be found in .eslintrc.json.
 */
gulp.task('lint', function () {
    return gulp.src('resources/assets/js/**/*')
        .pipe(eslint())
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
});

/**
 * This task uglifies and concatenates all javascript files. Prior to this the
 * lint task gets executed.
 */
gulp.task('js', ['lint'], function () {
    return gulp.src([
            'resources/assets/vendor/jquery/dist/jquery.min.js',
            'resources/assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'resources/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            'resources/assets/js/**/*'
        ])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/assets/js/'));
});

/**
 * This task builds both css and javascript files. This should be used for
 * deployment.
 */
gulp.task('build', ['css', 'js'], function () {
});