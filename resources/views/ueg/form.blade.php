{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
    <div class="form-group">
        {{Form::label("clave","Clave",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::text("clave","",["class" => "form-control", "v-model" => "ueg.clave", "placeholder" => 'clave unidad ejecutora del gasto'])}}
            <span class="help-block" style="color: red" v-if="errores['clave']">
                <em v-text="errores['clave'][0]"></em>
            </span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label("descripcion","Descripcion",["class"=>"control-label col-sm-2"])}}
        <div class="col-sm-10">
            {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "ueg.descripcion", "rows" => 5, "style" => "resize: none", "placeholder" => "descripcion unidad ejecutora del gasto"])}}
            <span class="help-block" style="color: red" v-if="errores['descripcion']">
                <em v-text="errores['descripcion'][0]"></em>
            </span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label("ur", "Unidad Responsable", ["class" => "control-label col-sm-2"])}}
        <div class="col-sm-10">
            <select v-model="ueg.ur_id" class="form-control">
                <option v-for="ur in urs" v-text="ur.clave" :value="ur.id"></option>
            </select>
            <span class="help-block" style="color: red" v-if="errores['ur_id']">
                <em v-text="errores['ur_id'][0]"></em>
            </span>
        </div>
    </div>
{{Form::close()}}