<!DOCTYPE html>
<html lang="ES">
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    	<meta name="csrf-token" content="{{ csrf_token() }}">
			{{Html::style('css/style.css')}}
			<title>@yield('title')</title>
		</head>
		<body>
			@include('layouts.navbar')
			<div class="container">
				@yield('content')
			</div>
			{{Html::script('https://use.fontawesome.com/48bcad2f1a.js')}}
			{{Html::script('js/app.js')}}
			<script>
	      		$(document).ready(function(){
	        		$('.dropdown-submenu a.test').on("click", function(e){
	          			$(this).next('ul').toggle();
	          			e.stopPropagation();
	          			e.preventDefault();
	          		});
	          	});
    		</script>
		</body>
</html>