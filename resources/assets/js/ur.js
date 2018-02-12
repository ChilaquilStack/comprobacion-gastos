"use strict";

var up = new Vue({
	
	'el': '#ur',
	
	'created': function(){
		this.obtener_ups();
		this.obtener_urs(this.pagination.current_page);
	},

	'data': {
		'ur_buscar': '',
		'urs': [],
		'ups': [],
		'ur': {
			'id': '',
			'descripcion': '',
			'año': '',
			'up_id': ''
		},
		'old_ur': {
			'id': '',
			'descripcion': '',
			'año': '',
			'up_id': ''
		},
		'pagination': {
			'total': 0, 
			'per_page': 2,
			'from': 1,
			'to': 0,
			'current_page': 1
		},
		'offset': 5,
		'errores': {}
	},

	'computed': {
		
		'isActived': function () {
			return this.pagination.current_page;
        },

        'pagesNumber': function () {
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
        'searchUR': function () {
        	return this.urs.filter((ur) => ur.id.includes(this.ur_buscar));
        }
    },

	'methods':{

		'agregar_ur': function() {
			this.ur.año = $("#año").text();
			if(this.validar_ur(this.ur)){
				axios.post('ur', this.ur).then(response => {
					$("#agregar_ur").modal('hide');
					this.modal_success(response.data);
					this.obtener_urs(this.pagination.current_page);
					this.ur.id = '';
					this.ur.descripcion = '';
					this.ur.año = '';
					this.ur.up_id = '';
				}).catch(error => {
					this.errores = error.response.data.errors;
				});
			}
		},

		'eliminar_ur': function(ur){
			let url = 'ur/' + ur.id;
			swal({
                title: 'Esta seguro?',
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
                	axios.delete(url).then(response => {
                		this.modal_success(response.data);
                		this.obtener_urs(this.pagination.current_page);
                	}).catch(error => {
                		this.modal_error('Error');
                	});
                } else if (result.dismiss === 'cancel') {
                    this.modal_error("Operacion cancelada")
                }
            })
		},

		'editar_ur': function(ur) {
			$("#editar_ur").modal();
			this.old_ur.id = ur.id;
			this.old_ur.descripcion = ur.descripcion;
			this.old_ur.año = $('#año').text();
			this.old_ur.up_id = ur.up_id;
		},

		'actualizar_ur': function(ur) {
			let url = 'ur/' + ur.id;
			if(this.validar_ur(ur)){
				axios.put(url, ur).then(response => {
					$("#editar_ur").modal('hide');
					this.modal_success(response.data);
					this.obtener_urs();
				}).catch(error => {
					this.modal_error(error.data);
				});
			}
		},

		'mostrar_formulario_agregar_ur': function() {
			$("#agregar_ur").modal();
		},

		'obtener_ups': function() {
			axios('up/ups_all').then(response => this.ups = response.data);
		},

		'obtener_urs': function(page) {
			url = 'ur/urs?page=' + page
			axios(url).then(response => {
				this.pagination = response.data.pagination;
				this.urs = response.data.data.data
			})
		},

		'validar_ur': function(ur) {
			let now = new Date();
			if(ur.id == '') {
				this.modal_info('Ingrese una clave');
				return false;
			} else if (ur.id.length != 3){
				this.modal_info('La clave debe ser de 3 digitos');
				return false;
			}
			if(ur.descripcion == '') {
				this.modal_info('Ingrese una descripcion');
				return false;
			}
			if(ur.año == '') {
				this.modal_info('Ingrese un año');
				return false;
			} 
			return true;
		},
		
		changePage: function (page) {
            this.pagination.current_page = page;
            this.obtener_urs(page);
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
	}
});