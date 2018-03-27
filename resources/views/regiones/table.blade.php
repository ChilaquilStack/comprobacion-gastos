<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed table-striped">
		<caption>
			<h1>
				Regiones
				<button class="btn btn-success btn-sm" title="Agregar Region" @click="agregar">Agregar</button></h1>
			<div class="navbar-form navbar-right">
				<div class="form-group">
					{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...', 'v-model' => 'region'])}}
					<button type="submit" class="btn btn-default" @click="buscar">Buscar</button>
				</div>
        	</div>
		</caption>
		<thead>
			<tr>
				<th>Region</th>
			</tr>
		</thead>
		<tbody class="well well-sm">
			<tr v-for="region in regiones">
				<td v-text='region.nombre'></td>
				<td>
					<div class="btn-group btn-group-sm " role="group">
						<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Region" @click="editar(region)">Editar
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Region" @click="eliminar(region)">Baja
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</script>