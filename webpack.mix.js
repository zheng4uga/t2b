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
   .sass('resources/sass/dashboard.scss','public/css')
   .sass('node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss','public/css');
//css
mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css','public/css/dataTables.bootstrap4.min.css');
mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.css','public/css');
mix.copy('node_modules/fullcalendar/dist/fullcalendar.print.min.css','public/css');


//fonts
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts','public/webfonts',true);

//js
mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.js','public/js');
mix.copy('node_modules/moment/min/moment.min.js','public/js');
mix.copy('node_modules/bootstrap4-notify/bootstrap-notify.min.js','public/js');
mix.copy('node_modules/bootstrap-3-typeahead/bootstrap3-typeahead.min.js','public/js');
