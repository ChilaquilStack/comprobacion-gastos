<div class="modal fade" tabindex="-1" role="dialog" id="editar_municipio">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Municipio</h4>
            </div>
            <div class="modal-body">
                {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
                {{Form::text("nombre","",["class" => "form-control", "v-model" => "old_municipio.nombre", "autofocus"])}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="actualizar_municipio(old_municipio)">Actualizar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->