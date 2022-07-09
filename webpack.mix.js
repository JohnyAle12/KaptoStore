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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .combine([
        'node_modules/intl-tel-input/build/css/intlTelInput.min.css',
        'public/css/app.css',
    ], 'public/css/app.css')
    .scripts([
        'node_modules/intl-tel-input/build/js/intlTelInput.min.js',
        'node_modules/intl-tel-input/build/js/utils.js',
        'resources/js/custom-scripts.js'
    ], 'public/js/bundle.private.js');

mix.copy('node_modules/intl-tel-input/build/img/flags.png', 'public/img/flags.png')
    .copy('node_modules/intl-tel-input/build/img/flags@2x.png', 'public/img/flags@2x.png');

//mix.browserSync('http://localhost:8000');

if(mix.inProduction()){
	mix.version();
}