<script type="text/template" id="ur">
	<div class="row">
		<modal :id="'agregar_ur'" :title="title_modal">
			<template slot="modal-body">
				@include('ur.form')
			</template>
			<template slot="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-success" v-show="action.save" @click="guardar_ur">Guardar</button>
				<button type="button" class="btn btn-success" v-show="action.update"@click="actualizar_ur">Actualiar</button>
			</template>
		</modal>
		<div class="col-lg-12 col-md-8 col-sm-4">
			<ur-tabla
				:urs='urs'
				@agregar="agregar_ur"
				@editar="editar_ur"
				@eliminar="eliminar_ur">
			</ur-tabla>
			<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
		</div>
	</div>
</script>