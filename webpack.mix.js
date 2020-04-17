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
    .js('resources/assets/backend/js/app.backend.js', 'backend/js')
    .js('resources/assets/frontend/js/app.frontend.js', 'frontend/js')
    .sass('resources/assets/backend/sass/app.backend.scss', 'backend/css')
    .sass('resources/assets/frontend/sass/app.frontend.scss', 'frontend/css')
    .version()
    .browserSync('192.168.99.100:8080')
    .disableSuccessNotifications();
