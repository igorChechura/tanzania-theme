let mix = require('laravel-mix');

mix.copyDirectory('src/fonts', 'assets/fonts');

mix.js('src/js/main.js', 'assets/scripts/').options({
    processCssUrls: false
});

mix.sass('src/sass/main.scss', 'assets/styles/')
    .sass('template-parts/blocks/slider/slider.scss', 'template-parts/blocks/slider')
    .sass('template-parts/blocks/accordion/accordion.scss', 'template-parts/blocks/accordion')
    .sass('template-parts/blocks/text-image/text-image.scss', 'template-parts/blocks/text-image')
    .options({
    processCssUrls: false
});

mix.minify([
    'assets/scripts/main.js',
    'assets/styles/main.css',
    'template-parts/blocks/slider/slider.css',
    'template-parts/blocks/slider/slider.js',
    'template-parts/blocks/accordion/accordion.css',
    'template-parts/blocks/accordion/accordion.js',
    'template-parts/blocks/text-image/text-image.css',
]);

mix.sourceMaps(false, 'source-map');

mix.browserSync({
    proxy: 'tanzania.test',
    files: [
        'assets/styles/main.min.css',
        'js/**/*.js',
        '**/*.php'
    ]
});