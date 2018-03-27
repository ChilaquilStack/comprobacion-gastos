<script type="text/template" id="table">
	<table class="table table-hover table-condensed">
		<caption>
			<h1>
				@{{title}}
				<button class="btn btn-success btn-sm" :title="`Agregar ${title}`" @click="agregar">Agregar</button></h1>
			<div class="navbar-form navbar-right">
				<div class="form-group">
					{{Form::text('buscar', null,['class' => 'form-control', 'placeholder' => 'Buscar...'])}}
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
        	</div>
		</caption>
		<thead>
			<tr>
				<slot name="thead"></slot>
			</tr>
		</thead>
		<tbody class="well well-sm">
			<slot name="tbody"></slot>
		</tbody>
	</table>
</script>