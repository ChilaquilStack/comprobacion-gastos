<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Region</th>
			<th>Municipio</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="escuela in escuelas">
			<td>
				@{{escuela.id}}
			</td>
			<td>
				@{{escuela.nombre}}
			</td>
			<td>
				@{{escuela.region.nombre}}
			</td>
			<td>
				@{{escuela.region.municipio.nombre}}
			</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Escuela"@click="editar_escuela(escuela)">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Escuela" @click="eliminar_escuela(escuela)">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')