var gulp = require('gulp');

/*
 Just aliases for commands
 */
gulp.task('assets:build', ['styles', 'jshint', 'scripts']);
gulp.task('assets:watch', ['watch']);
gulp.task('assets:dev', ['browsersync:init', 'assets:build', 'watch']);
