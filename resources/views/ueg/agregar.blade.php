<div class="modal fade" tabindex="-1" role="dialog" id="agregar_ueg">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Unidad Ejecutora del Gasto</h4>
            </div>
            <div class="modal-body">

                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    
                    {{Form::label("clave","Clave",["class"=>"control-label"])}}
                    {{Form::text("clave","",["class" => "form-control", "v-model" => "ueg.id"])}}
                    <span class="help-block" style="color: red" v-if="errores.id">
                        <em>
                            @{{errores.id[0]}}
                        </em>
                    </span>

                    {{Form::label("descripcion","Descripcion",["class"=>"control-label"])}}
                    {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "ueg.descripcion", "rows" => 5, "style" => "resize: none" ])}}
                        
                    {{Form::label("ur", "Unidad Responsable", ["class" => "control-label"])}}
                    <select v-model="ueg.ur_id" class="form-control">
                        <option v-for="ur in urs">
                            @{{ur.id}}
                        </option>
                    </select>

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="agregar_ueg">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->