{{Form::open(["class" => "form-horizontal", "role"=>"form"])}}

    {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
    {{Form::text("nombre","",["class" => "form-control", "v-model" => "uog.nombre", "placeholder" => "nombre de la unidad operadora del gasto"])}}
        
    {{Form::label("municipio","Municipio",["class"=>"control-label"])}}
    <select class="form-control" v-model="uog.municipios_id">
        <option v-for="municipio in municipios" :value="municipio.id" v-text="municipio.nombre"></option>
    </select>

    {{Form::label("ueg","Unidad Ejecutora del Gasto",["class"=>"control-label"])}}
    <select class="form-control" v-model="uog.ueg_id">
        <option v-for="ueg in uegs" :value="ueg.id" v-text="ueg.clave"></option>
    </select>

{{Form::close()}}