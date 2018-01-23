<template>
	<div class="row">
		<h1>
			Hola
		</h1>
	</div>
</template>

<script>
	import axios from axios;
	module.exports = {

		created: function() {
			this.obtener_municipios(this.pagination.current_page);
		},
		
		data: function () {
			old_municipio: {id: '', nombre:''},
			new_municipio: "",
			municipios: [],
			region: "",
			region_municipio: "",
			regiones: [],
			pagination: {
				total: 0, 
				per_page: 2,
				from: 1,
				to: 0,
				current_page: 1
			},
			offset: 5,
		},
		
		computed: {
			isActived: function () {
				return this.pagination.current_page;
        	},
        	pagesNumber: function () {
        		let from = this.pagination.current_page - this.offset;
            	let to = from + (this.offset * 2);
            	let pagesArray = [];

	        	if (!this.pagination.to) {
	        		return [];
	        	}
	            if (from < 1) {
	            	from = 1;
	            }
	            if (to >= this.pagination.last_page) {
	                to = this.pagination.last_page;
	            }
	            while (from <= to) {
	                pagesArray.push(from);
	                from++;
	            }
	            return pagesArray;
        	}
    	},
    	
    	methods: {
		
			mostrar_formulario_agregar_municipio: function(){
				$("#agregar_municipio").modal();
			},

			agregar_municipio: function() {
				if(this.new_municipio != "") {
					let url = 'municipio';
					axios({
						url: url,
						method: 'post',
						data: {nombre: this.new_municipio}
					}).then(response =>{
						this.modal_success(response.data);
						this.obtener_municipios();
						this.new_municipio = "";
						$("#agregar_municipio").modal('hide');
					}).catch(error => {
						this.modal_error("Error", error);
					});
				} else {
					this.modal_info("Alerta", "Porfavor ingrese el nombre del municipio");
				}
			},
			
			eliminar_municipio: function(municipio) {
				swal({
					title: 'Esta seguro?',
					text: "Los elementos seran eliminados",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si, eliminar!',
					cancelButtonText: 'No, cancelar!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
				}).then((result) => {
					if (result.value) {
						let url = 'municipio/' + municipio.id;
						axios.delete(url)
						.then(response => {		
							this.modal_success("Eliminado", "Municipio Eliminado");
							this.obtener_municipios(this.pagination.current_page);
						}).catch(error => {
							console.log("Error")
						});
					} else if (result.dismiss === 'cancel') {
						this.modal_error("Cancelado", "No se a eliminado")
					}
				})
			},

			obtener_municipios: function(page) {
				let url = 'municipio/municipios?page='+page;
				axios.get(url)
				.then(response => {
					this.pagination = response.data.pagination;
					this.municipios = response.data.data.data;
				}).catch(error => {
					console.info(error);
				});
			},

			editar_municipio: function(municipio) {
				this.old_municipio.id = municipio.id
				this.old_municipio.nombre = municipio.nombre;
				$("#editar_municipio").modal();
			},

			actualizar_municipio: function(municipio) {
				if(municipio.nombre != '') {
					let url = 'municipio/' + municipio.id;
					axios.put(url, {'nombre': municipio.nombre})
						.then(response => {
							this.obtener_municipios(this.pagination.current_page);
							$("#editar_municipio").modal('hide');
							this.modal_success(response.data);
					})
						.catch(error => {
							console.log(error.response);
					});
				} else {
					this.modal_info("Alerta", "Porfavor ingrese el nombre del municipio");
				}
			},

			changePage: function (page) {
				this.pagination.current_page = page;
				this.obtener_municipios(page);
	      	},
	      	
			modal_success: function(title) {
				swal({
					title: title,
					type: 'success',
					showCloseButton: false,
					showConfirmButton: false,
					focusConfirm: false,
					timer: 1500
				})
			},

			modal_error: function(title, text){
				swal({
					title: title,
					text:  text,
					type: 'error',
					showCloseButton: false,
					showConfirmButton: false,
					focusConfirm: false,
					timer: 1500
				});
			},

			modal_info: function(title, text) {
				swal({
					title: title,
					text:  text,
					type: 'info',
					showCloseButton: false,
					showConfirmButton: false,
					focusConfirm: false,
					timer: 1500
				});
			},

			modal_warning: function(title, text, index) {
				swal({
					title: title,
					text: text,
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si, eliminar!',
					cancelButtonText: 'No, cancelar!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
				}).then((result) => {
					if (result.value) {
						this.modal_success("Eliminado", "Municipio Eliminado");
						this.municipios.splice(index, 1);
					} else if (result.dismiss === 'cancel') {
						this.modal_error("Cancelado", "No se a eliminado")
					}
				})
			}
		}
	}
</script>


<style type="">
	p {
		font-size: 2em;
		text-align: center;
	}
</style>