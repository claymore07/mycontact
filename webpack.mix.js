let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/bootstrap-theme.css',
        'resources/assets/css/custom.css',
        'resources/assets/css/jasny-bootstrap.min.css',

    ], './public/css/libs.css')
    .scripts([
        'resources/assets/js/jquery.min.js',
        'resources/assets/js/jasny-bootstrap.min.js',

        'resources/assets/js/npm.js',
        'resources/assets/js/bootstrap.js',

    ], './public/js/libs.js');
