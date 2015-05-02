var gulp = require('gulp');
var config = require('../config');

/*
 Watcher tasks
 $ gulp watch
 */
gulp.task('watch', function() {
    gulp.watch([config.paths.assets.sass + '**/*.scss', config.paths.assets.sass + '**/*.sass'], ['styles']).on('error', function(err) {
        console.error('Error', err.message);
    });
    gulp.watch(config.paths.assets.js + '**/*.js', ['jshint', 'scripts']).on('error', function(err) {
        console.error('Error', err.message);
    });
});