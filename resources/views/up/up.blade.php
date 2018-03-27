<script type="text/template" id="up">
	<div class="row">
		<div class="col-sm-4 col-lg-12 col-md-8 ">
			<modal :id="'agregar_up'" :title='title_modal'>
				<template slot="modal-body">
					@include('up.form')
				</template>
				<template slot="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" @click="guardar_up" v-show="action.save">Guardar</button>
					<button type="button" class="btn btn-success" @click="actualizar_up" v-show="action.update">Actualizar</button>
				</template>
			</modal>
			<up-tabla 
				:ups='ups'
				@agregar='agregar_up'
				@editar='editar_up'
				@eliminar='eliminar_up'
				@buscar="buscar_up">
			</up-tabla>
			<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
		</div>
	</div>
</script>