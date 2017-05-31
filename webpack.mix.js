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

var scsses = [
    'app.scss',
];

var scripts = [
    'app.js',
    'home.js',
];

scsses.forEach(function(filename) {
    mix.sass('resources/assets/sass/' + filename, 'public/css');
});

scripts.forEach(function(filename) {
    mix.js('resources/assets/js/' + filename, 'public/js');
});

mix.copy('resources/assets/images', 'public/images', false);

mix.browserSync({
    proxy: 'http://localhost/',
    files: [
        'webpack.mix.js',
        'resources/assets/sass/*',
        'resources/assets/images/*',
        'resources/assets/js/*',
        'resources/assets/js/components/*',
        'resources/views/*',
        'resources/views/*/*'
    ]
})
