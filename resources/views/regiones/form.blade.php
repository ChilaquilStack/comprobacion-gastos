{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
	<div class="form-group">
		{{Form::label("nombre","Nombre",["class"=>"control-label col-sm-2"])}}
		<div class="col-sm-10">
			{{Form::text("nombre","",["class" => "form-control", "v-model" => "region.nombre", "placeholder" => "nombre de la region"])}}
			<span class="help-block" v-if="errors['region.nombre']" style="color: red">
				<strong v-text="errors['region.nombre'][0]"></strong>
			</span>
		</div>
	</div>
{{Form::close()}}