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
mix.webpackConfig({ node: { fs: "empty" }, })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/public_broadcast.js', 'public/js')
    .js('resources/js/private_broadcast.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');