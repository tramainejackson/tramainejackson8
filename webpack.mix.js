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

mix.js('resources/src/js/mdb.pro.es.js', 'public/js/app.js');
mix.sass('resources/src/scss/mdb.pro.scss', 'public/css/style.min.css');
// mix.sass('resources/src/scss2/mdb.pro.scss', 'public/css/test/style.min.css');
mix.postCss('resources/css/custom_styles.css', 'public/css/custom_styles.min.css');
mix.postCss('resources/css/md-form.css', 'public/css/md-form.min.css');
// mix.postCss('resources/css/app.css', 'public/css', [
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);
