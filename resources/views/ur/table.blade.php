<table class="table table-hover table-condensed table-striped">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Unida Presupuestal</th>
			<th>Descripcion</th>
			<th>Año</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="ur in urs">
			<td>
				@{{ur.id}}
			</td>
			<td>
				@{{ur.up_id}}
			</td>
			<td>
				@{{ur.descripcion}}
			</td>
			<td>
				@{{ur.año}}
			</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Responsable"@click="editar_ur(ur)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Responsable" @click="eliminar_ur(ur)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')