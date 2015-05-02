var gutil = require('gulp-util');

/*
 Differentiate dev to production via the --prod flag
 Running without the flag will assume development mode and tasks can use the isDevelopment variable to check this
 */
var isDevelopment = true;
var sassStyle = 'compact';
var sourceMap = true;

if (gutil.env.prod === true) {
    sassStyle = 'compressed';
    isDevelopment = false;
    sourceMap = false;
}

/*
    --verbose flag
 */
var verboseMode = false;
if(gutil.env.verbose === true) {
    verboseMode = true;
}

// Directory names
var bowerDirectory = 'bower_components/';

var resourcesBasePath = 'resources/';
var sassSourcePath = resourcesBasePath + 'sass/';
var jsSourcePath = resourcesBasePath + 'js/';

var publicBasePath = 'public/';
var cssOutputPath = publicBasePath + 'css/';
var jsOutputPath = publicBasePath + 'js/';
var fontsOutputPath = publicBasePath + 'fonts/';

// Export our config object
module.exports = {
    isDevelopment: isDevelopment,
    siteUrl: 'http://team-nfc.dev', // change this to match the site URL you use in development
    paths: {
        bower: bowerDirectory,

        libraries: {
            full: resourcesBasePath + 'lib/',
            main: resourcesBasePath + 'lib/main/'
        },

        assets: {
            sass: sassSourcePath,
            js: jsSourcePath
        },

        output: {
            css: cssOutputPath,
            js: jsOutputPath,
            fonts: fontsOutputPath
        }
    },
    sassConfig: {
        sourcemap: sourceMap,
        bundleExec: true,
        loadPath: [
            sassSourcePath,
            bowerDirectory + 'foundation/scss/',
            bowerDirectory + 'components-font-awesome/scss/',
            bowerDirectory + 'lato/scss/'
        ],
        style: sassStyle,
        verbose: verboseMode
    }
};
