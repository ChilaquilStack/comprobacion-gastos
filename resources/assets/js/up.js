var up = new Vue({
	'el': '#up',

	'created': function() {
		this.obtener_ups(this.pagination.current_page);
	},

	'data': {
		'ups': [],
		'up': {
			'id': '',
			'descripcion': '',
			'año': ''
		},
		'old_up': {
			'id': '',
			'descripcion': '',
			'año': ''
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
        }
    },

	'methods':{

		'obtener_ups': function(page) {
			let url = 'up/ups?page' + page;
			axios('up/ups').then(response => {
				this.pagination = response.data.pagination;
				this.ups = response.data.data.data;
			});
		},

		'agregar_up': function(){
			let url = 'up';
			this.up.año = $("#año").text();
			if(this.validar_up(this.up)){
				axios.post(url, this.up)
				.then(response => {
					this.modal_success(response.data);
					$("#agregar_up").modal('hide');
					this.obtener_ups(this.pagination.current_page);
					this.up.id = '';
					this.up.descripcion = '';
					this.up.año = '';
				})
				.catch(error => {
					this.errores = error.response.data.errors;
				});
			}
		},

		'eliminar_up': function(up){
			let url = 'up/' + up.id;
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
                		this.modal_success(response.data)
                		this.obtener_ups(this.pagination.current_page);
                	}).catch(error => {
                		this.modal_error("Error");
			});
                } else if (result.dismiss === 'cancel') {
                    this.modal_error("Operacion cancelada")
                }
            })
		},

		'editar_up': function(up) {
			this.old_up.id = up.id;
			this.old_up.descripcion = up.descripcion;
			this.old_up.año = $('#año').text();
			$("#editar_up").modal();
		},
		
		'actualizar_up': function(up){
			let url = 'up/' + up.id;
			if(this.validar_up(up)){
				axios.put(url, up).then(response => {
					$("#editar_up").modal('hide');
					this.modal_success(response.data);
					this.obtener_ups(this.pagination.current_page);
				}).catch(error => {
					this.modal_error(error.data);
				});
			}
		},

		'mostrar_formulario_agregar_up': function(){
			$("#agregar_up").modal();
		},

		'validar_up': function(up) {
			if(up.id == '') {
				this.modal_info('Ingrese una clave');
				return false;
			} else if (up.id.length != 2){
				this.modal_info('La clave debe ser de 2 digitos');
				return false;
			}
			if(up.descripcion == '') {
				this.modal_info('Ingrese una descripcion');
				return false;
			}
			if(up.año == '') {
				this.modal_info('Ingrese un año');
				return false;
			} 
			return true;
		},

		modal_success: function(title) {
			swal({
				title: title,
				type: 'success',
				showCloseButton: false,
				showConfirmButton: false,
				focusConfirm: true,
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
				showclosebutton: false,
				showconfirmbutton: false,
				focusconfirm: false,
				timer: 1500
			});
		},

		errors: function (message) {
			swal({
				type: error,
				showconfirmbutton: false,
				timer: 1500,
				toast: true
			});
		}
	}
})