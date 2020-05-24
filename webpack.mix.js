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

mix
    .setPublicPath('public/build')
    .setResourceRoot('build')
    //.js('resources/assets/admin/js/app.admin.js', 'js')
    .js('resources/assets/site/js/app.site.js', 'js')
    //.sass('resources/assets/admin/sass/app.admin.scss', 'css')
    .sass('resources/assets/site/sass/app.site.scss', 'css')
    .version()
    .browserSync('127.0.0.1:8080')
    .disableSuccessNotifications();
