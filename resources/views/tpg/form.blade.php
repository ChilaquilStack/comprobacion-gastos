{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
    {{Form::label("descripcion","Descripcion",["class"=>"control-label"])}}
    {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "tpg.descripcion", "style" => "resize: none"])}}
{{Form::close()}}
          