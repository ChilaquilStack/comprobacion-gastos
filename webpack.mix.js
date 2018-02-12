let mix = require('laravel-mix');
mix.scripts([
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.min.js',
	'resources/assets/js/jquery.min.js',
	'resources/assets/js/bootstrap.min.js',
	'resources/assets/js/sweetalert2.all.js',
	'resources/assets/js/funciones.js',
	'resources/assets/js/municipios.js',
	'resources/assets/js/regiones.js',
	'resources/assets/js/escuelas.js',
	'resources/assets/js/ueg.js',
	'resources/assets/js/ur.js',
	'resources/assets/js/up.js',
	'resources/assets/js/navbar.js',
	'resources/assets/js/tpg.js',
	'resources/assets/js/register.js'
], 'public/js/app.js')
.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/bootstrap-theme.min.css',
	'resources/assets/css/chosen.min.css',
	'resources/assets/css/app.css'
], 'public/css/style.css');