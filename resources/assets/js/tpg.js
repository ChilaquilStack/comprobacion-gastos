var up = new Vue({

	'el': '#tpg',

	'created': function() {
		this.obtener_tpgs(this.pagination.current_page);
	},

	'data': {
		'buscar_tpg': '',
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
        },

        'searchTPG': function () {
        	return this.tpgs.filter((tpg) => tpg.descripcion.includes(this.buscar_tpg));
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
					modal(response.data, 'success');
					$("#agregar_tpg").modal('hide');
					this.obtener_tpgs(this.pagination.current_page);
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
                		modal(response.data, 'success')
                		this.obtener_tpgs(this.pagination.current_page);
                	}).catch(error => {
                		modal("Error", 'error');
					});
                } else if (result.dismiss === 'cancel') {
                    modal("Operacion cancelada", 'error')
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
					modal(response.data, 'success');
					this.obtener_tpgs(this.pagination.current_page);
				}).catch(error => {
					modal(error.data, 'error');
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

	}
})