<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed table-striped">
		<caption>
			<h1>
				Unidades Ejecutoras del Gasto
				<button class="btn btn-success btn-sm" title="Agregar Unidad Ejecutora del Gasto" @click="agregar">Agregar</button>
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
				<th>Clave</th>
				<th>Unidad Responsable</th>
				<th>Unidad Presupuestal</th>
				<th>Descripcion</th>
				<th>Año</th>
			</tr>
		</thead>
		<tbody class="well well-sm">
			<tr v-for="ueg in uegs">
				<td v-text="ueg.clave"></td>
				<td v-text="ueg.ur.clave"></td>
				<td v-text="ueg.ur.up.clave"></td>
				<td v-text="ueg.descripcion"></td>
				<td v-text="ueg.año"></td>
				<td>
					<div class="btn-group btn-group-sm " role="group">
						<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Responsable"@click="editar(ueg)">Editar
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Responsable" @click="eliminar(ueg)">Baja
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</script>