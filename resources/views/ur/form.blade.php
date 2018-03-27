{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
    <div class="form-group">
        {{Form::label("clave","Clave",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::text("clave","",["class" => "form-control", "v-model" => "ur.clave", "placeholder" => "clave unidad responsable"])}}
            <span class="help-block" style="color:red" v-if="errors['clave']">
                <em v-text="errors['clave'][0]"></em>
            </span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label("descripcion","Descripcion",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "ur.descripcion", "rows" => 5, "style" => "resize: none", 'placeholder' => 'descripcion unidad responsable'])}}
            <span class="help-block" style="color:red" v-if="errors['descripcion']">
                <em v-text="errors['descripcion'][0]"></em>
            </span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label("up", "Unidad Presupuestal", ["class" => "control-label col-sm-2"])}}
        <div class="col-sm-10">
            <select v-model="ur.up_id" class="form-control">
                <option v-for="up in ups" v-text="up.clave" :value="up.id"></option>
            </select>
            <span class="help-block" style="color:red" v-if="errors['up_id']">
                <em v-text="errors['up_id'][0]"></em>
            </span>
        </div>
    </div>
{{Form::close()}}