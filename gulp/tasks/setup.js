var gulp = require('gulp');

/*
 Basically an alias for the bower tasks

 $ gulp setup
 */
gulp.task('setup', ['bower']);

/*
 Bower stuff - use this OR setup - doesn't matter too much though, it'll just repeat itself.
 This runs tasks that mainly just move assets from bower_components into other places.
 Ultimately, you can just reference files from bower_components directly if that's what you want.
 It's personal preference.

 $ gulp bower
 */
gulp.task('bower', ['main-bower-files', 'modernizr', 'fontawesome-fonts', 'lato-font']);