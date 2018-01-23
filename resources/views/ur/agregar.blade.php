<div class="modal fade" tabindex="-1" role="dialog" id="agregar_ur">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Unidad Responsable</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                
                    {{Form::label("clave","Clave",["class"=>"control-label"])}}
                    {{Form::text("clave","",["class" => "form-control", "v-model" => "ur.id", "autofocus"])}}
                    <span class="help-block" style="color:red" v-if="errores.id">
                        <em>@{{errores.id[0]}}</em>
                    </span>

                    {{Form::label("descripcion","Descripcion",["class"=>"control-label"])}}
                    {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "ur.descripcion", "rows" => 5, "style" => "resize: none" ])}}

                    {{Form::label("up", "Unidad Presupuestal", ["class" => "control-label"])}}
                    <select v-model="ur.up_id" class="form-control">
                        <option v-for="up in ups">
                            @{{up.id}}
                        </option>
                    </select>

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="agregar_ur">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->