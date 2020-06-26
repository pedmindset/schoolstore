const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const purgeCss = require("laravel-mix-purgecss");

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
   .copy('node_modules/line-awesome/dist/line-awesome/fonts', 'public/fonts')
   .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/scss/admin.scss', 'public/css')
   .sass('resources/sass/scss/chartist.scss', 'public/css')
   .sass('resources/sass/scss/datatables.scss', 'public/css')
   .sass('resources/sass/scss/date-picker.scss', 'public/css')
   .sass('resources/sass/scss/dropzone.scss', 'public/css')
   .sass('resources/sass/scss/flag-icon.scss', 'public/css')
   .sass('resources/sass/scss/fontawesome.scss', 'public/css')
   .sass('resources/sass/scss/landing_page.scss', 'public/css')
   .sass('resources/sass/scss/owlcarousel.scss', 'public/css')
   .sass('resources/sass/scss/prism.scss', 'public/css')
   .sass('resources/sass/scss/rating.scss', 'public/css')
   .sass('resources/sass/scss/slick-theme.scss', 'public/css')
   .sass('resources/sass/scss/slick.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('./tailwind.config.js') ],
    }).purgeCss({
      defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || []
  });

