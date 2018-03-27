<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed">
		<caption>
			<h1>
				Tipos de Programa General
				<button class="btn btn-success btn-sm" title="Agregar Tipo de Programa General" @click="agregar">Agregar</button>
			</h1>
			<div class="navbar-form navbar-right">
				<div class="form-group">
					{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...'])}}
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
        	</div>
		</caption>
		<thead>
			<tr>
				<th>ID/Folio</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody class="well well-sm">
			<tr v-for="tpg in tpgs">
				<td v-text="tpg.id"></td>
				<td v-text="tpg.descripcion"></td>
				<td>
					<div class="btn-group btn-group-sm " role="group">
						<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Escuela"@click="editar(tpg)">Editar
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Escuela" @click="eliminar(tpg)">Baja
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</script>