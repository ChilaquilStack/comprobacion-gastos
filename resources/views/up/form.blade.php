{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}    
    <div class="form-group">
        {{Form::label("clave","Clave",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::text("clave","",["class" => "form-control", "v-model" => "up.clave", "placeholder" => 'Clave Unidad Presupuestal'])}}
            <span class="help-block" style="color: red" v-if="errors['clave']">
                <em v-text="errors['clave'][0]"></em>
            </span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label("descripcion","Descripción",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "up.descripcion", "rows" => 5, "style" => "resize: none", "placeholder" => "Descripción Unidad Presupuestal"])}}
            <span class="help-block" style="color: red" v-if="errors['descripcion']">
                <em v-text="errors['descripcion'][0]"></em>
            </span>
        </div>
    </div>
{{Form::close()}}