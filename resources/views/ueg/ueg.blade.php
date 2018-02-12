<script type="text/template" id="ueg">
	<div class="row">
		<div class="col-lg-12 col-md-8 col-sm-4">
			<modal :id="'agregar_ueg'" :title='title_modal'>
				<template slot="modal-body">
					@include('ueg.form')
				</template>
				<template slot="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" @click="guardar_ueg" v-show="action.save">Guardar</button>
					<button type="button" class="btn btn-success" @click="actualizar_ueg" v-show="action.update">Actualizar</button>
				</template>
			</modal>
			<ueg-tabla 
				:uegs='uegs'
				@agregar='agregar_ueg'
				@editar='editar_ueg'
				@eliminar='eliminar_ueg'>
			</ueg-tabla>	
			<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
		</div>
	</div>
</script>