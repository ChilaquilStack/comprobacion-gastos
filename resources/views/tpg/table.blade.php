<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>ID/Folio</th>
			<th>Descripcion</th>
		</tr>
	</thead>
	<tbody class="well well-sm">
		<tr v-for="tpg in tpgs">
			<td>@{{tpg.id}}</td>
			<td>@{{tpg.descripcion}}</td>
			<td>
				<div class="btn-group btn-group-sm " role="group">
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Escuela"@click="editar_tpg(tpg)">Editar
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Escuela" @click="eliminar_tpg(tpg)">Baja
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</td>
		</tr>
	</tbody>
</table>