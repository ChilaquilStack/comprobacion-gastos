<script type="text/template" id="uog">
	<div class="row" id="escuelas">
		<div class="col-lg-12 col-md-8 col-sm-4">
			
			<modal :id="'agregar_uog'" :title="title_modal">
				<template slot="modal-body">
					@include('uog.form')
				</template>
				<template slot="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" v-show="action.save" @click="guardar">Guardar</button>
					<button type="button" class="btn btn-success" v-show="action.update"@click="actualizar">Actualiar</button>
				</template>
			</modal>
			
			<tabla @agregar="agregar" :title="'Unidad Operadora del Gasto'">
				<template slot="thead">
					<th>#</th><th>Nombre</th><th>Municipio</th><th>Region</th><th>Unidad Ejecutora del Gasto</th><th>Unidad Responsable</th><th>Unidad Presupuestal</th>
				</template>
				<template slot="tbody">
					<tr v-for="uog in uogs">
						<td v-text="uog.id"></td>
						<td v-text="uog.nombre"></td>
						<td v-text="uog.municipio.nombre"></td>
						<td v-text="uog.municipio.region.nombre"></td>
						<td v-text="uog.ueg.clave"></td>
						<td v-text="uog.ueg.ur.clave"></td>
						<td v-text="uog.ueg.ur.up.clave"></td>
						<td>
							<div class="btn-group btn-group-sm " role="group">
								<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Escuela"@click="editar(uog)">Editar
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</button>
								<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Escuela" @click="eliminar(uog)">Baja
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
							</div>
						</td>
					</tr>
				</template>
			</tabla>
			
		</div>
	</div>
</script>