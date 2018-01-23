<div class="modal fade" tabindex="-1" role="dialog" id="agregar_escuela">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Unidad Operadora del Gasto</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}

                    {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
                    {{Form::text("nombre","",["class" => "form-control", "v-model" => "new_escuela.nombre", "autofocus"])}}
                    
                    {{Form::label("municipio","Municipio",["class"=>"control-label"])}}
                    <select class="form-control" v-model="new_escuela.municipios_id">
                        <option v-for="municipio in municipios" :value="municipio.id">
                            @{{municipio.nombre}}
                        </option>
                    </select>

                    {{Form::label("ueg","Unidad Ejecutora del Gasto",["class"=>"control-label"])}}
                    <select class="form-control" v-model="new_escuela.ueg_id">
                        <option v-for="ueg in uegs" :value="ueg.id">
                            @{{ueg.id}}
                        </option>
                    </select>

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="agregar_escuela">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->