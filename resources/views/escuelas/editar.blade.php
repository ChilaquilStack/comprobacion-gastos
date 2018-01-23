<div class="modal fade" tabindex="-1" role="dialog" id="editar_escuela">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Unidad Operadora del Gasto</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
                    {{Form::text("nombre","",["class" => "form-control", "v-model" => "old_escuela.nombre", "autofocus"])}}

                    {{Form::label("region","Region",["class"=>"control-label"])}}
                    
                    <select class="form-control" v-model="old_escuela.municipios_id">
                        <option v-for="municipio in municipios" :value="municipio.id">
                            @{{municipio.nombre}}
                        </option>
                    </select>

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="actualizar_escuela(old_escuela)">Actualizar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->