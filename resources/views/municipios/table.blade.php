<table class="table table-hover table-condensed table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Municipio</th>
			<th>Region</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="municipio in municipios">
			<td>
				@{{municipio.id}}
			</td>
			<td>
				@{{municipio.nombre}}
			</td>
			<td>
				@{{municipio.region.nombre}}
			</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Municipio"@click="editar_municipio(municipio)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Municipio" @click="eliminar_municipio(municipio)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')