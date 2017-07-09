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
mix.js('resources/assets/js/app.js', 'public/js/app.js').extract([
    'vue','jquery','element-ui','element-ui/lib/locale/lang/zh-CN'
]);
var scripts = [
    'home.js',
    'login.js',
    'register.js',
    'nav.js',
	'articles.index.js',
	'articles.show.js',
	'my.articles.create.js',
	'my.articles.index.js',
	'my.articles.show.js',
	'my.dirs.index.js',
	'my.dirs.show.js',
	'my.tags.create.js',
	'my.tags.index.js',
	'my.tags.show.js',
];

scsses.forEach(function(filename) {
    mix.sass('resources/assets/sass/' + filename, 'public/css');
});

scripts.forEach(function(filename) {
	mix.js('resources/assets/js/' + filename, 'public/js');
});

mix.copy('resources/assets/images', 'public/images', false);

if (mix.config.inProduction) {
    mix.version();
}

mix.browserSync({
    proxy: 'http://localhost/',
    files: [
        'webpack.mix.js',
        'resources/assets/sass/*',
        'resources/assets/images/*',
        'resources/assets/js/*',
	    'resources/assets/js/my/*',
        'resources/assets/js/components/*',
        'resources/views/*',
        'resources/views/*/*',
	    'public/mix-manifest.js'
    ]
})
