{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
	<div class="form-group">
    	{{Form::label("nombre","Nombre",["class"=>"control-label col-sm-2"])}}
    	<div class="col-sm-10">
    		{{Form::text("nombre","",["class" => "form-control", "v-model" => "municipio.nombre", 'placeholder' => 'nombre del municipio'])}}
    		<span class="help-block" style="color: red" v-if="errors['municipio.nombre']">
    			<strong v-text="errors['municipio.nombre'][0]"></strong>
    		</span>
    	</div>
	</div>
	<div class="form-group">
    	{{Form::label("region","Region",["class"=>"control-label col-sm-2"])}}
    	<div class="col-sm-10">
    		<select class="form-control" v-model='municipio.regiones_id'>
        		<option v-for="region in regiones" :value="region.id" v-text="region.nombre"></option>
    		</select>
    		<span class="help-block" style="color: red" v-if="errors['municipio.regiones_id']">
    			<strong v-text="errors['municipio.regiones_id'][0]"></strong>
    		</span>
    	</div>
	</div>
{{Form::close()}}