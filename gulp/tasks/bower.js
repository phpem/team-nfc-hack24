var gulp = require('gulp');
var bower = require('gulp-bower');
var mainBowerFiles = require('main-bower-files');
var rename = require('gulp-rename');
var config = require('../config');

// this just copies the bower components specified to a /lib directory to use instead of having them separate
gulp.task('main-bower-files', function () {
    return gulp.src(mainBowerFiles())
        .pipe(gulp.dest(config.paths.libraries.main))
});

// extra task for modernizr as it doesn't have a main file and we want to include it separately (not along with everything else)
gulp.task('modernizr', function () {
    return gulp.src(config.paths.bower + 'modernizr/modernizr.js')
        .pipe(gulp.dest(config.paths.libraries.main));
});

// this moves font awesome fonts from where they are to the fonts directory.
gulp.task('fontawesome-fonts', function () {
    return gulp.src(config.paths.bower + 'components-font-awesome/fonts/**')
        .pipe(gulp.dest(config.paths.output.fonts));
});

// this moves slick.css to the lib folder and renames it to scss.
gulp.task('slick-move-css', function () {
    return gulp.src(config.paths.libraries.main + 'slick.css')
        .pipe(rename('_slick.scss'))
        .pipe(gulp.dest(config.paths.assets.dev.css + 'slick'));
});

// this moves lato fonts
gulp.task('lato-font', function () {
    return gulp.src(config.paths.bower + 'lato/font/**')
        .pipe(gulp.dest(config.paths.output.fonts));
});