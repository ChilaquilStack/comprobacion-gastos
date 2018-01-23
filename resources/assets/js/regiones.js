"use strict";
Vue.config.devtools = true
var CRUD_regiones = new Vue({
	el: "#regiones",
	created: function() {
		this.obtener_regiones(this.pagination.current_page);
	},
	data: {
		old_region: {id: '', nombre: ''},
		region: {nombre: ""},
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
		
		mostrar_formulario_agregar_region: function(){
			$("#agregar_region").modal();
		},

		agregar_region: function() {
			if(this.region.nombre != ''){
				let url = 'region';
				axios.post(url, this.region).then(response => {
					this.modal_success(response.data);
					this.obtener_regiones();
					this.region.nombre = "";
					$("#agregar_region").modal('hide');
				}).catch(error => {
					console.log("Error");
				});
			} else {
				if(this.new_region.nombre == ''){
					this.modal_info("Ingrese el nombre de la region");
				}
			}
		},
		
		eliminar_region: function(region) {
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
					let url = 'region/' + region.id;
					axios.delete(url)
					.then(response => {
						this.obtener_regiones(this.pagination.current_page);
					}).catch(error => {
						console.log("Error")
					});
				} else if (result.dismiss === 'cancel') {
					this.modal_error("Cancelado", "No se a eliminado")
				}
			})
		},

		obtener_regiones: function(page) {
			let url = 'region/regiones?page='+page;
			axios.get(url)
			.then(response => {
				this.pagination = response.data.pagination;
				this.regiones = response.data.data.data;
			}).catch(error => {
				console.info(error);
			});
		},

		editar_region: function(region) {
			this.old_region.id = region.id
			this.old_region.nombre = region.nombre;
			$("#editar_region").modal();
		},

		actualizar_region: function(region){
			if(region.nombre != ''){
				let url = 'region/' + region.id;
				axios.put(url, this.old_region)
					.then(response => {
						this.obtener_regiones(this.pagination.current_page);
						$("#editar_region").modal('hide');
						this.modal_success(response.data);
				})
					.catch(error => {
						console.log(error.response);
				});
			}
		},

		changePage: function (page) {
			this.pagination.current_page = page;
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
					this.modal_success("Eliminado");
				} else if (result.dismiss === 'cancel') {
					this.modal_error("Cancelado", "No se a eliminado")
				}
			})
		}
	}
});