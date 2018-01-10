<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Region</th>
			<th>Municipio</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="region in regiones">
			<td>
				@{{region.id}}
			</td>
			<td>
				@{{region.nombre}}
			</td>
			<td>
				@{{region.municipio.nombre}}
			</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Region"@click="editar_region(region)">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Region" @click="eliminar_region(region)">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')