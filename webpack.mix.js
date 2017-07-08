const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
            'resources/assets/theme/css/bootstrap.css',
            'resources/assets/theme/css/materialadmin.css',
            'resources/assets/theme/css/font-awesome.min.css',
            'resources/assets/theme/css/material-design-iconic-font.min.css'
        ],
        'public/theme/css/theme-styles.css')
    .styles([
            'resources/assets/libs/slick/slick.css',
            'resources/assets/libs/slick/slick-theme.css',
        ],
        'public/libs/vendor-styles.css')
    .scripts([
            'resources/assets/libs/slick/slick.js',
        ],
        'public/libs/vendor-scripts.js')
    .js(['resources/assets/js/page-scripts/wall.js'], 'public/js')
    .version();