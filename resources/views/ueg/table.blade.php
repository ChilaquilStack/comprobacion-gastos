<table class="table table-hover table-condensed table-striped">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Unidad Responsable</th>
			<th>Unidad Presupuestal</th>
			<th>Descripcion</th>
			<th>Año</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
			
		<tr v-for="ueg in uegs">
			<td>
				@{{ueg.id}}
			</td>
			<td>
				@{{ueg.ur.id}}
			</td>
			<td>
				@{{ueg.ur.up.id}}
			</td>
			<td>
				@{{ueg.descripcion}}
			</td>
			<td>
				@{{ueg.año}}
			</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Responsable"@click="editar_ueg(ueg)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Responsable" @click="eliminar_ueg(ueg)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@include('layouts.paginator')