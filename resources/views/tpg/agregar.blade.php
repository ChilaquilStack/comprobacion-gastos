<div class="modal fade" tabindex="-1" role="dialog" id="agregar_tpg">
    
    <div class="modal-dialog" role="document">
        		
        <div class="modal-content">
            		
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                </button>
                <h4 class="modal-title">Agregar Unidad Operadora del Gasto</h4>
            </div>
            	
            <div class="modal-body">
                {{Form::open(["class" => "form-horizontal", "role"=>"form"])}}
                    {{Form::label("descripcion","Descripcion",["class"=>"control-label"])}}
                    {{Form::textarea("descripcion","",["class" => "form-control", "v-model" => "tpg.descripcion", "style" => "resize: none"])}}
                {{Form::close()}}
            </div>
            	
    		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary" @click="agregar_tpg">Guardar</button>
    		</div>

	   </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->