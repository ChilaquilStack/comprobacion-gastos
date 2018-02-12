let mix = require('laravel-mix');
mix.js('resources/assets/js/app.js', 'public/js')
	.styles([
		'resources/assets/css/bootstrap.min.css',
		'resources/assets/css/bootstrap-theme.min.css',
		'resources/assets/css/chosen.min.css',
		'resources/assets/css/app.css'
], 'public/css/style.css');