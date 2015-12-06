var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.styles([
      '../../bower/bootstrap/dist/css/bootstrap.min.css',
    ]);
    mix.scripts([
      '../../bower/jquery/dist/jquery.min.js',
      '../../bower/bootstrap/dist/js/bootstrap.min.js',
    ]);
    mix.copy('resources/bower/bootstrap/dist/fonts', 'public/fonts');
    
});
