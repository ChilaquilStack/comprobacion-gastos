<!DOCTYPE html>
<html lang="ES">
<html>
<head>
	{{Html::style('css/style.css')}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
</head>
<body>
	@include('layouts.navbar')
	<div class="container" id="app">
		@yield('content')
	</div>
	{{Html::script('https://use.fontawesome.com/48bcad2f1a.js')}}
	{{Html::script('js/script.js')}}
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