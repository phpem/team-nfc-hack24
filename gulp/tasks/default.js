var gulp = require('gulp');
var config = require('../config');

/*
 Default task
 $ gulp
 */
if (config.isDevelopment) {
    gulp.task('default', ['assets:dev']);
} else {
    gulp.task('default', ['assets:build']);
}
