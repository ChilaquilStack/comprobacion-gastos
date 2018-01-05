let mix = require('laravel-mix');
mix.scripts([
	'resources/assets/js/jquery-3.2.1.min.js',
	'resources/assets/js/bootstrap.min.js',
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.min.js',
	'resources/assets/js/app.js'
], 'public/js/script.js')
.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/bootstrap-theme.min.css'
], 'public/css/style.css');