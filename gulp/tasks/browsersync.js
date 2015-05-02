var gulp = require('gulp');
var browsersync = require('browser-sync');
var config = require('../config');

gulp.task('browsersync:init', function () {
    // if we're in development, start browsersync
    if (config.isDevelopment) {
        browsersync({
            proxy: config.siteUrl
        });
    }
});