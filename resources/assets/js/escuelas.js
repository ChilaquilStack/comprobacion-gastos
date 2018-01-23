"use strict";
Vue.config.devtools = true
var CRUD_escuelas = new Vue({
	el: "#escuelas",
	created: function() {
		this.obtener_escuelas(this.pagination.current_page);
		this.obtener_municipios();
		this.obtener_uegs();
	},
	data: {
		old_escuela: {id: '', nombre:'', municipios_id: '', ueg_id: ''},
		new_escuela: {nombre: '', municipios_id: '', ueg_id: ''},
		escuelas: [],
		municipios: [],
		uegs: [],
		pagination: {
			total: 0, 
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		offset: 5,
		escuela: ''
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
        },
        searchEscuela: function() {
        	return this.escuelas.filter((escuela) => escuela.nombre.includes(this.escuela));
        }
    },
	methods: {
		mostrar_formulario_agregar_escuela: function(){
			$("#agregar_escuela").modal();
		},
		
		agregar_escuela: function() {
			if(this.new_escuela.nombre != "" && this.new_escuela.municipios_id != '') {
				let url = 'escuela';
				axios.post(url, this.new_escuela)
				.then(response =>{
					this.modal_success(response.data);
					this.obtener_escuelas();
					this.new_escuela.nombre = "",
					this.new_escuela.municipios_id = "",
					this.new_escuela.ueg_id = "",
					$("#agregar_escuela").modal('hide');
				}).catch(error => {
					this.modal_error("Error", error);
				});
			} else {
				if(this.new_escuela.nombre == ""){
					this.modal_info("Porfavor ingrese el nombre de la escuela");
				} else {
					this.modal_info("Porfavor seleccione el municipio a la que pertenece la Unidad Operadora del Gasto");
				}
			}
		},
		
		eliminar_escuela: function(municipio) {
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
					let url = 'escuela/' + municipio.id;
					axios.delete(url)
					.then(response => {		
						this.modal_success(response.data);
						this.obtener_escuelas(this.pagination.current_page);
					}).catch(error => {
						console.log("Error")
					});
				} else if (result.dismiss === 'cancel') {
					this.modal_error("Operacion cancelada")
				}
			})
		},

		obtener_escuelas: function(page) {
			let url = 'escuela/escuelas?page='+page;
			axios.get(url)
			.then(response => {
				this.pagination = response.data.pagination;
				this.escuelas = response.data.data.data;
			}).catch(error => {
				console.info(error);
			});
		},

		editar_escuela: function(escuela) {
			this.old_escuela.id = escuela.id
			this.old_escuela.nombre = escuela.nombre;
			this.old_escuela.municipios_id = escuela.municipios_id;
			$("#editar_escuela").modal();
		},

		actualizar_escuela: function(escuela){
			if(escuela.nombre != ''){
				let url = 'escuela/' + escuela.id;
				axios.put(url, this.old_escuela)
					.then(response => {
						this.obtener_escuelas(this.pagination.current_page);
						$("#editar_escuela").modal('hide');
						this.modal_success(response.data);
				})
					.catch(error => {
						console.log(error.response);
				});
			} else {
				this.modal_info("Alerta", "Porfavor ingrese el nombre del municipio");
			}
		},
		
		obtener_municipios: function() {
			let url = 'municipio/municipios_all';
			axios.get(url)
			.then(response => {
				this.municipios = response.data;
			}).catch(error => {
				console.info(error);
			});
		},

		obtener_uegs: function(){
			let url = 'ueg/uegs_all';
			axios.get(url).then(response => {
				this.uegs = response.data;
			}).catch(error => console.log("Error"));
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

		modal_error: function(title){
			swal({
				title: title,
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
});