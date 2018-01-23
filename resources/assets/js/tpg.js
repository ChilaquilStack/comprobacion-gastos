var up = new Vue({
	'el': '#tpg',

	'created': function() {
		this.obtener_tpgs(this.pagination.current_page);
	},

	'data': {
		'tpgs': [],
		'tpg': {
			'descripcion': ''
		},
		'old_tpg': {
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

		'agregar': function () {
			$("#agregar_tpg").modal();
		},

		'obtener_tpgs': function(page) {
			let url = 'tpg/tpgs?page' + page;
			axios(url).then(response => {
				this.pagination = response.data.pagination;
				this.tpgs = response.data.data.data;
			});
		},

		'agregar_tpg': function(){
			let url = 'tpg';
			if(this.validar_tpg(this.tpg)) {
				axios.post(url, this.tpg)
				.then(response => {
					this.modal_success(response.data);
					$("#agregar_tpg").modal('hide');
					this.obtener_ups(this.pagination.current_page);
					this.up.descripcion = '';
				})
				.catch(error => {
					this.errores = error.response.data.errors;
				});
			}
		},

		'eliminar_tpg': function(tpg){
			let url = 'tpg/' + tpg.id;
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
                		this.obtener_tpgs(this.pagination.current_page);
                	}).catch(error => {
                		this.modal_error("Error");
					});
                } else if (result.dismiss === 'cancel') {
                    this.modal_error("Operacion cancelada")
                }
            })
		},

		'editar_tpg': function(tpg) {
			this.old_tpg.id = tpg.id;
			this.old_tpg.descripcion = tpg.descripcion;
			$("#editar_tpg").modal();
		},
		
		'actualizar_tpg': function(tpg){
			let url = 'tpg/' + tpg.id;
			if(this.validar_tpg(tpg)){
				axios.put(url, tpg).then(response => {
					$("#editar_tpg").modal('hide');
					this.modal_success(response.data);
					this.obtener_tpgs(this.pagination.current_page);
				}).catch(error => {
					this.modal_error(error.data);
				});
			}
		},

		'mostrar_formulario_agregar_up': function(){
			$("#agregar_tpg").modal();
		},

		'validar_tpg': function(tpg) {
			if(tpg.descripcion == '') {
				this.modal_info('Ingrese una descripcion');
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
				showCloseButton: false,
				showConfirmButton: false,
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