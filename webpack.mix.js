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

mix
	.js('resources/js/app.js', 'public/js')
	.vue({extractVueStyles: true})
    .disableNotifications()
	.browserSync('fightworld.loc')
    // .postCss('resources/css/app.css', 'public/css', [])
    .sass('resources/css/index.scss', 'public/css', [])
    .sass('resources/css/main.scss', 'public/css', [])
    .copy('resources/css/fontello.css', 'public/fontello.css')
    .options({ processCssUrls: false})
;
