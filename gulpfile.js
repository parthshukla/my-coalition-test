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
    mix.sass('app.scss');

    /* mixing all the required css files by different vendors */
     mix.styles([
    	'bootstrap/dist/css/bootstrap.min.css',
      'sweetalert/dist/sweetalert.css',
    	],'public/css/vendor.css','bower_components/');

     /* Mixing the css of the base theme */
     mix.styles([
     'base-theme.css',
      ],'public/css/base-theme.css','resources/assets/css/');




    /* js files of vendors */
       mix.scripts([
        'jquery/dist/jquery.min.js',
        'bootstrap/dist/js/bootstrap.js',
        'sweetalert/dist/sweetalert.min.js',            

      ],'public/js/vendor.js','bower_components/');

       /* js files of application */
       mix.scripts([
        'manage_stock.js',

      ],'public/js/application/application.js','resources/assets/js/');
    
});
