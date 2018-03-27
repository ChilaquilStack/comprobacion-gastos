<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed table-striped">
		<caption>
			<h1>
				Unidades Presupuestales
				<button class="btn btn-success btn-sm" title="Agregar Unidad Presupuestal" @click="agregar">Agregar</button>
			</h1>
				<div class="navbar-form navbar-right">
					<div class="form-group">
						{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...', 'v-model' => 'up'])}}
						<button type="submit" class="btn btn-default" @click="buscar">Buscar</button>
					</div>
	        	</div>
		</caption>
		<thead>
			<tr>
				<th>Clave</th><th>Descripción</th><th>Año</th><th>Opciones</th>
			</tr>
		</thead>	
		<tbody class="well well-sm" id="tbody">
			<tr v-for="up in ups">
				<td v-text="up.clave"></td>
				<td v-text="up.descripcion"></td>
				<td v-text="up.año"></td>
				<td>
					<div class="btn-group btn-group-sm " role="group">
						<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Presupuestal"@click="editar(up)">Editar
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Presupuestal" @click="eliminar(up)">Baja
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</script>