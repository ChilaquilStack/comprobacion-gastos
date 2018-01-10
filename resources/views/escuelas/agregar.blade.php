<div class="modal fade" tabindex="-1" role="dialog" id="agregar_escuela">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Escuela</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
                    {{Form::text("nombre","",["class" => "form-control", "v-model" => "new_escuela.nombre", "autofocus"])}}
                    
                    {{Form::label("region","Region",["class"=>"control-label"])}}
                    <select class="form-control" v-model="new_escuela.regiones_id">
                        <option v-for="region in regiones" :value="region.id">
                            @{{region.nombre}}
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