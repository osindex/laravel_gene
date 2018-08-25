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

// mix.js('resources/assets/js/app.js', 'public/js')
   // .sass('resources/assets/sass/app.scss', 'public/css');
mix
// .styles([
//     'resources/assets/assets/css/bootstrap.min.css',
// ], 'public/assets/css/app.css')
	.scripts([
    'resources/assets/assets/js/core/jquery.min.js',
    'resources/assets/assets/js/core/bootstrap.min.js',
    'resources/assets/assets/js/core/jquery.slimscroll.min.js',
    'resources/assets/assets/js/core/jquery.scrollLock.min.js',
    'resources/assets/assets/js/core/jquery.appear.min.js',
    'resources/assets/assets/js/core/jquery.countTo.min.js',
    'resources/assets/assets/js/core/jquery.placeholder.min.js',
    'resources/assets/assets/js/core/js.cookie.min.js',
    'resources/assets/assets/js/app.js',
], 'public/assets/js/all.js')
    .copy('node_modules/vue/dist/vue.js', 'public/assets/js/vue.js')
    .copy('node_modules/vue/dist/vue.min.js', 'public/assets/js/vue.min.js')
    // .copy('node_modules/vue-router/dist/vue-router.min.js', 'public/assets/js/vue-router.min.js')
    .copy('resources/assets/assets/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css')
    .copy('resources/assets/assets/css/oneui.css', 'public/assets/css/oneui.css')
    .copyDirectory('resources/assets/assets/css/themes', 'public/assets/css/themes')
	.copyDirectory('resources/assets/assets/img', 'public/assets/img')
    .copyDirectory('resources/assets/assets/fonts', 'public/assets/fonts')
    .copyDirectory('resources/assets/assets/js/pages', 'public/assets/js/pages')
	.copyDirectory('resources/assets/assets/js/plugins', 'public/assets/js/plugins');