
<table class="table table-hover table-condensed" v-if='searchRegion.length > 0'>
	<thead>
		<tr>
			<th>#</th>
			<th>Region</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="region in searchRegion">
			<td>@{{region.id}}</td>
			<td>@{{region.nombre}}</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Region"@click="editar_region(region)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Region" @click="eliminar_region(region)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')