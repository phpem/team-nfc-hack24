var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var filter = require('gulp-filter');
var config = require('../config');
var browsersync = require('browser-sync');
var reload = browsersync.reload;

gulp.task('sass', ['styles']);

// Do things with our stylesheet
gulp.task('styles', function () {

    var sassConfig = config.sassConfig;
    sassConfig.onError = browsersync.notify;
    console.log(config.sassConfig.sourcemap);
    return sass(config.paths.assets.sass + 'main.scss', sassConfig)
        .on('error', function (err) {
            console.error('Error', err.message);
        })
        .pipe(prefix({ browsers: ["last 2 versions", "> 1%", "ie 9", "safari > 6"] })) // prefix for browsers
        .pipe(sourcemaps.write())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(config.paths.output.css))
        .pipe(filter('**/*.css'))
        .pipe(notify({ message: 'Sass task complete.' }))
        .pipe(reload({ stream: true }));
});