let mix = require('laravel-mix');
mix.scripts([
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.min.js',
	'resources/assets/js/jquery-3.2.1.min.js',
	'resources/assets/js/bootstrap.min.js',
	'resources/assets/js/chosen.jquery.min.js',
	'resources/assets/js/sweetalert2.all.js',
	'resources/assets/js/municipios.js',
	'resources/assets/js/regiones.js',
	'resources/assets/js/escuelas.js'
], 'public/js/script.js')
.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/bootstrap-theme.min.css',
	'resources/assets/css/chosen.min.css',
	'resources/assets/css/app.css'
], 'public/css/style.css');