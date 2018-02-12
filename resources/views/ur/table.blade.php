<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed table-striped">
		<caption>
			<h1>
				Unidad Responsable
				<button class="btn btn-success btn-sm" title="Agregar Unidad Responsable" @click="agregar">Agregar</button>
			</h1>
			<div class="navbar-form navbar-right">
				<div class="form-group">
					{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...'])}}
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
			</div>
		</caption>
		<template v-if="urs.length > 0">
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
					<td v-text="ur.clave"></td>
					<td v-text="ur.up.clave"></td>
					<td v-text="ur.descripcion"></td>
					<td v-text="ur.año"></td>
					<td>
						<div class="btn-group btn-group-sm " role="group">
							<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Unidad Responsable"@click="editar(ur)">Editar
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</button>
							<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Baja Unidad Responsable" @click="eliminar(ur)">Baja
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
						</div>
					</td>
				</tr>
			</tbody>
		</template>
		<div v-else class="jumbotron">
			<h1>Lo sentimos.</h1>
			<p>Aun no existen Unidades Responsables.</p>
		</div>
	</table>
</script>