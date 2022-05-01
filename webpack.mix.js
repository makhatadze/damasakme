const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/admin.js', 'public/js')
    .react()
    .js('resources/js/app.js', 'public/js')
    .react()
    .sass('resources/sass/admin.sass', 'public/css', [
        //
    ])
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.browserSync('laravel-9.test');
