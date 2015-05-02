/*
    HOW TO USE THIS GULPFILE: (TL;DR) $ gulp setup && gulp

    There's 2 main tasks in this file that do the things we (you) need.
    The 'setup' task, which is essentially an alias for the 'bower' task, which moves files from where bower put them, to where we want them for easier referencing.
    $ gulp setup

    Then there's also the default gulp task - this will do things with stylesheets / SASS and JS files, THEN start our file watchers.
    $ gulp

    You can also specify the production environment for this file:
    $ gulp --prod

    Individual tasks have descriptions as to what they do as well.

    I probably need to decide on better naming...
*/

var requireDir = require('require-dir');
requireDir('./gulp/tasks', { recurse: true });





