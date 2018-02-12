<script type="text/template" id="tabla">
	<table class="table table-hover table-condensed table-striped">
		<caption>
			<h1>Tipo de Programa General</h1>
			<div class="navbar-form navbar-right">
				<div class="form-group">
					{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...', 'v-model' => 'cog'])}}
					<button type="submit" class="btn btn-default" @click="buscar">Buscar</button>
				</div>
        	</div>
		</caption>
		<thead>
			<tr>
				<th>ID/Folio</th><th>Descripción</th>
			</tr>
		</thead>
		<tbody class="well well-sm">
			<tr v-for="cog in cogs">
				<td v-text="cog.id"></td>
				<td v-text="cog.descripcion"></td>
			</tr>
		</tbody>
	</table>
</script>