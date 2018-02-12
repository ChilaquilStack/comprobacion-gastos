<script type="text/template" id="tpg">
	<div class="row">
		<div class="col-lg-12 col-md-8 col-sm-4">
			<modal :id="'agregar_tpg'" :title='title_modal'>
				<template slot="modal-body">
					@include('tpg.form')
				</template>
				<template slot="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" @click="guardar_tpg" v-show="action.save">Guardar</button>
					<button type="button" class="btn btn-success" @click="actualizar_tpg" v-show="action.update">Actualizar</button>
				</template>
			</modal>
			<tpg-tabla 
				:tpgs='tpgs'
				@agregar='agregar_tpg'
				@editar='editar_tpg'
				@eliminar='eliminar_tpg'>
			</tpg-tabla>	
			<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
		</div>
	</div>
</script>