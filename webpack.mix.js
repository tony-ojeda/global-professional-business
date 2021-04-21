const mix = require('laravel-mix');

/// WEB

mix
    .setPublicPath('public')
    .js('resources/assets/backend/js/app.js', 'public/backend/js/app.js')
    .sass('resources/assets/backend/scss/app.scss','public/backend/css/app.css')
    .js('resources/assets/login/js/app.js', 'public/login/js/app.js')
    .sass('resources/assets/login/scss/app.scss','public/login/css/app.css')
    .less(
		'resources/assets/frontend/less/app.less',
		'public/frontend/css/app.css'
   	)
	.js('resources/assets/frontend/js/app.js',
		'public/frontend/js/app.js')
	.js('resources/assets/frontend/js/custom.js',
		'public/frontend/js/custom.js')
    .sourceMaps()
    .webpackConfig({
        devtool: 'source-map'
    })
    .options({
        processCssUrls: false
    })
    .browserSync({
		proxy: 'http://localhost/gpb/public',
		files: [
            'app/**/*',
            'public/**/*',
            'resources/views/**/*',
			'resources/assets/**/*',
            'routes/**/*'
        ]
   });


// mix.browserSync({
//     proxy : 'http://localhost/gpb/public/',
//     open: true,
//     files: [
//         'app/**/*',
//         'public/**/*',
//         'resources/views/**/*',
//         'resources/assets/**/*',
//         'routes/**/*'
//     ]
// });


/// VUEXY

// const exec = require('child_process').exec;
// require('dotenv').config();

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// const glob = require('glob')
// const path = require('path')

// /*
//  |--------------------------------------------------------------------------
//  | Vendor assets
//  |--------------------------------------------------------------------------
//  */

// function mixAssetsDir(query, cb) {
//   (glob.sync('resources/' + query) || []).forEach(f => {
//     f = f.replace(/[\\\/]+/g, '/');
//     cb(f, f.replace('resources/assets/vuexy', 'public/vuexy'));
//   });
// }

// const sassOptions = {
//     precision: 5
// };

// // plugins Core stylesheets
// mixAssetsDir('assets/vuexy/sass/plugins/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// // themes Core stylesheets
// mixAssetsDir('assets/vuexy/sass/themes/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// // pages Core stylesheets
// mixAssetsDir('assets/vuexy/sass/pages/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// // Core stylesheets
// mixAssetsDir('assets/vuexy/sass/core/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// // script js
// mixAssetsDir('assets/vuexy/js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest));

// /*
//  |--------------------------------------------------------------------------
//  | Application assets
//  |--------------------------------------------------------------------------
//  */

// mixAssetsDir('assets/vuexy/vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest));
// mixAssetsDir('assets/vuexy/vendors/css/**/*.css', (src, dest) => mix.copy(src, dest));
// mixAssetsDir('assets/vuexy/vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest));
// mix.copyDirectory('resources/assets/vuexy/images', 'public/vuexy/images');
// mix.copyDirectory('resources/assets/vuexy/fonts', 'public/vuexy/fonts');



// mix.js('resources/assets/vuexy/js/core/app-menu.js', 'public/vuexy/js/core')
//   .js('resources/assets/vuexy/js/core/app.js', 'public/vuexy/js/core')
//   .sass('resources/assets/vuexy/sass/bootstrap.scss', 'public/vuexy/css')
//   .sass('resources/assets/vuexy/sass/bootstrap-extended.scss', 'public/vuexy/css')
//   .sass('resources/assets/vuexy/sass/colors.scss', 'public/vuexy/css')
//   .sass('resources/assets/vuexy/sass/components.scss', 'public/vuexy/css')
//   .sass('resources/assets/vuexy/sass/custom-rtl.scss', 'public/vuexy/css')
//   .sass('resources/assets/vuexy/sass/custom-laravel.scss', 'public/vuexy/css');

// //
