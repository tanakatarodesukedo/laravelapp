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

// mix.react('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.js(
   [
      'resources/ngapp/dist/ngapp/runtime-es2015.js',
      'resources/ngapp/dist/ngapp/vendor-es2015.js',
      'resources/ngapp/dist/ngapp/styles-es2015.js',
      'resources/ngapp/dist/ngapp/polyfills-es2015.js',
      'resources/ngapp/dist/ngapp/main-es2015.js'
   ],
   'public/js/app.js'
);

mix.sass(
   'resources/sass/app.scss',
   'public/css/app.css'
);
