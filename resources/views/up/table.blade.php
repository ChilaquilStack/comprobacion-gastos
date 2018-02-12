<table class="table table-hover table-condensed" v-if="ups.length > 0">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Descripcion</th>
			<th>Año</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="up in searchUp">
			<td>@{{up.id}}</td>
			<td>@{{up.descripcion}}</td>
			<td>@{{up.año}}</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Presupuestal"@click="editar_up(up)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Presupuestal" @click="eliminar_up(up)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')