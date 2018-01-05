{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
	{{Form::label("nombre","Nombre",["class"=>"control-label"])}}
	{{Form::text("nombre","",["class" => "form-control"])}}
{{Form::close()}}