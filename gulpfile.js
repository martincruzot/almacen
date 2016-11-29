const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
        .scripts([
            'libs/sweetalert-dev.js',
            'libs/jquery.easy-autocomplete.js'
        ],
        './public/js/libs.js')
        .styles([
            'libs/sweetalert.css',
            'libs/dataTables.bootstrap.min.css',
            'libs/easy-autocomplete.css',
            'libs/easy-autocomplete.themes.css'
        ],
        './public/css/libs.css')
       .webpack('app.js')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');

    mix.browserSync({proxy: 'almacen.dev'});
});
