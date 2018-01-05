<table class="table">
	<thead>
		<tr>
			<th>Municipio</th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="municipio in municipios">
			<td>@{{municipio}}</td>
			<td><button class="btn btn-warning">Editar</button></td>
			<td><button class="btn btn-danger">Eliminar</button></td>
		</tr>
	</tbody>
</table>