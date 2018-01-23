<div class="modal fade" tabindex="-1" role="dialog" id="editar_region">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Region</h4>
            </div>
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    
                    {{Form::label("nombre","Nombre",["class"=>"control-label"])}}
                    {{Form::text("nombre","",["class" => "form-control", "v-model" => "old_region.nombre", "autofocus"])}}
                    

                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="actualizar_region(old_region)">Actualizar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->