<script type="text/template" id="cog">
	<div class="row">
		<div class="col-sm-4 col-lg-12 col-md-8 ">
			<cog-tabla 
				:cogs='cogs'
				@buscar="buscar_cog">
			</cog-tabla>
			<paginator 
				:pagination="pagination" 
				:offset="offset" 
				@changepage="changePage">
			</paginator>
			{{Form::open(['class' => 'forn-horizontal', 'role' => 'form'])}}
				<div class="form-group">
					{{Form::label('movimiento','Movimiento:',['class' => 'control-label']	)}}
					<select class="form-control">
						<option>Bloqueo</option>
						<option>Dep. Inicial</option>
						<option>Gasto</option>
						<option>Regreso</option>
						<option>Cierre</option>
					</select>
				</div>
				{{Form::label('objeto_del_gasto','Objeto del Gasto:')}}
				<div class="form-group">
					<div class="col-sm-6">
						<select class="form-control">
							<option 
								v-for="concepto in conceptos" 
								v-text="concepto.nombre" 
								@click="check_concepto(concepto)">
							</option>
						</select>
					</div>
					<div class="col-sm-6">
						<select class="form-control">
							<option v-for="partida in partidas" v-text="partida.nombre"></option>
						</select>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
</script>