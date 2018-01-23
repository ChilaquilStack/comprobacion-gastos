<div class="modal fade" tabindex="-1" role="dialog" id="editar_up">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Unidad Presupuestal</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    {{Form::label("clave","Clave",["class"=>"control-label"])}}
                    {{Form::text("clave","",["class" => "form-control", "v-model" => "old_up.id", "readonly"])}}

                    {{Form::label("descripcion","Descripcion",["class"=>"control-label"])}}
                    {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "old_up.descripcion","autofocus"])}}

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="actualizar_up(old_up)">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->