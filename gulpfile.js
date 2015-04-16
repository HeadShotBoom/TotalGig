var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
        'libs/base.css',
        'libs/skeleton.css',
        'libs/jquery.mCustomScrollbar.min.css',
        'libs/layout.css'
    ])

    mix.scripts([
        'libs/jquery-2.0.3.min.js',
        'libs/jquery.mCustomScrollbar.concat.min.js',
        'libs/main.js'

    ])
});
