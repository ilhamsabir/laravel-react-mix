const mix = require('laravel-mix');

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

mix.react('src/resources/js/app.js', 'assets/js')
   .sass('src/resources/sass/app.scss', 'assets/css');

// mix.js('src/resources/js/app.js', 'assets/js')
//    .sass('src/resources/sass/app.scss', 'assets/css');