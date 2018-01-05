<!DOCTYPE html>
<html lang="ES">
<html>
<head>
	{{Html::style('css/style.css')}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
</head>
<body>
	@yield('content')
	{{Html::script('js/scrip.js')}}
</body>
</html>