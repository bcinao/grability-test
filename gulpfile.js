var elixir = require('laravel-elixir');

elixir(function(mix) {
    // compila el archivo app.scss
    mix.sass('app.scss')
        // Copia las fuentes al directorio /public
        .copy(
            [
                'bower_components/bootstrap-sass-official/assets/fonts',
                'bower_components/font-awesome/fonts'
            ],
            'public/fonts'
        )
        // Copia los archivos .js de jquery y bootstrap a resources/assets/js/vendor
        .copy(
            [
                'bower_components/jquery/dist/jquery.js',
                'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                'bower_components/angular/angular.js',
            ],
            'resources/assets/js/vendor'
        )
        // Compila todos los .js dentro de public/app.js
        .scripts(
            [
                'resources/assets/js/vendor/jquery.js',
                'resources/assets/js/vendor/bootstrap.js',
                'resources/assets/js/vendor/angular.js',
                'resources/assets/js/app.js'
            ],
            'public/js/app.js'
        )
        // Opcional: crea una version para cada compilado dentro de public/build
        .version(
            [
                "public/css/app.css",
                "public/js/app.js"
            ]
        );
});
