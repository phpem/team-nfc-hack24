var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglifyjs');
var jshint = require('gulp-jshint');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var config = require('../config');

if ( ! config.isDevelopment) {
    notify = require("gulp-empty");
}

// Concat, minify and sourcemap our JS files.
gulp.task('scripts', function () {

    // all the JS files we'll be concatenating and minifying.
    // in order of how they'll be compiled (think of it like include order)
    var jsFiles = [
        config.paths.libraries.main + 'modernizr.min.js',
        config.paths.libraries.main + 'jquery.js',
        config.paths.libraries.main + 'foundation.js',
        config.paths.libraries.main + 'jquery.vibrate.min.js',
        // you can add more foundation components in here as well
        // paths.libraries.full + 'foundation/js/foundation/foundation.topbar.js', // for example
        //config.paths.bower + 'foundation/js/foundation/foundation.offcanvas.js',
        config.paths.bower + 'foundation/js/foundation/foundation.equalizer.js',
        config.paths.assets.js + 'main.js'
    ];
    var compiledJS = gulp.src(jsFiles);
    var jsFileName = 'main.min.js';
    var jsOptions = {};

    // if we're on dev, generate a sourcemap
    if (gutil.env.dev === true) {
        jsOptions = { outSourceMap: '../../' + config.paths.assets.js + jsFileName + '.map' };
    }

    return compiledJS

        .pipe(sourcemaps.init())
            .pipe(uglify(jsFileName, jsOptions))
        .pipe(sourcemaps.write())
        .on('error', function (err) {
            console.error('Error', err.message);
        })
        .pipe(gulp.dest(config.paths.output.js))
        .pipe(notify({ message: 'JavaScript task complete' }));
});


// task to check for JS errors
gulp.task('jshint', function () {
    return gulp.src(config.paths.assets.js + 'main.js')
        .pipe(jshint())
        .on('error', function (err) {
            console.error('Error', err.message);
        })
        .pipe(jshint.reporter('default'))
        .pipe(notify({ message: 'JavaScript hinting done.' }));
});
