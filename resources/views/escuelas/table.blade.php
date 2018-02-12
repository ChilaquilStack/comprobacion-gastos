<table class="table table-hover table-condensed" v-if='searchEscuela.length > 0'>
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Municipio</th>
			<th>Region</th>
			<th>Unidad Ejecutora del Gasto</th>
			<th>Unidad Responsable</th>
			<th>Unidad Presupuestal</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="escuela in searchEscuela">
			<td>@{{escuela.id}}</td>
			<td>@{{escuela.nombre}}</td>
			<td>@{{escuela.municipio.nombre}}</td>
			<td>@{{escuela.municipio.region.nombre}}</td>
			<td>@{{escuela.ueg.id}}</td>
			<td>@{{escuela.ueg.ur.id}}</td>
			<td>@{{escuela.ueg.ur.up.id}}</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Escuela"@click="editar_escuela(escuela)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Escuela" @click="eliminar_escuela(escuela)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')