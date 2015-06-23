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
    mix.less('app.less');
    mix.styles(['bootstrap-datetimepicker.css', 'sweetalert.css']);
    mix.scripts(['jquery.2.1.3.min.js', 'bootstrap.3.3.1.min.js', 'moment.min.js','bootstrap-datetimepicker.min.js','sweetalert.min.js','script.js', 'es.js'],'public/js/app.js');
});