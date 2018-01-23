var ueg = new Vue({
	'el': '#ueg',
	'created': function(){
		this.obtener_urs();
		this.obtener_uegs(this.pagination.current_page);
	},
	'data': {
		'urs': [],
		'uegs': [],
		'ueg': {
			'id': '',
			'descripcion': '',
			'año': '',
			'ur_id': ''
		},
		'old_ueg': {
			'id': '',
			'descripcion': '',
			'año': '',
			'ur_id': ''
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

		'agregar_ueg': function(){
			let url = 'ueg';
			this.ueg.año = $("#año").text();
			if(this.validar_ueg(this.ueg)){
				axios.post(url, this.ueg).then(response => {
					$("#agregar_ueg").modal('hide');
					this.modal_success(response.data);
					this.obtener_uegs(this.pagination.current_page);
					this.ueg.id = '';		
					this.ueg.descripcion = '';		
					this.ueg.año = '';		
					this.ueg.ur_id = '';	
				}).catch(error => {
					this.errores = error.response.data.errors;
				});
			}
		},

		'eliminar_ueg': function(ueg){
			let url = 'ueg/' + ueg.id;
			axios.delete(url).then(response => {
				this.modal_success(response.data);
				this.obtener_uegs();
			}).catch(error => {
				console.log('Error');
			});
		},

		'editar_ueg': function(ueg){
			this.old_ueg.id = ueg.id;
			this.old_ueg.descripcion = ueg.descripcion;
			this.old_ueg.año = $('#año').text();
			this.old_ueg.ur_id = ueg.ur_id;
			$("#editar_ueg").modal();
		},

		'actualizar_ueg': function(ueg){
			let url = 'ueg/' + ueg.id;
			$('#editar_ueg').modal('hide');
			axios.put(url, ueg).then(response => {
				this.modal_success(response.data);
				this.obtener_uegs(this.pagination.current_page);
			}).catch(error => console.log("erorr"));
		},

		'mostrar_formulario_agregar_ueg': function(){
			$("#agregar_ueg").modal();
		},

		'obtener_uegs': function(page) {
			let url = 'ueg/uegs?page=' + page;
			axios.get(url).then(response => {
				this.pagination = response.data.pagination;
				this.uegs = response.data.data.data;
			}).catch(error => console.log("Error"));
		},

		'obtener_urs': function() {
			let url = 'ur/urs_all';
			axios.get(url).then(response => {
				this.urs = response.data;
			}).catch(erro => {
				console.log(error.data);
			});
		},

		'validar_ueg': function(ueg) {
			if(ueg.id == '') {
				this.modal_info('Ingrese una clave');
				return false;
			} else if (ueg.id.length != 5){
				this.modal_info('La clave debe ser de 5 digitos');
				return false;
			}
			if(ueg.descripcion == '') {
				this.modal_info('Ingrese una descripcion');
				return false;
			}
			if(ueg.año == '') {
				this.modal_info('Ingrese un año');
				return false;
			}
			if(ueg.ur_id == ''){
				this.modal_info('Ingrese la unidad responsable');
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
                focusConfirm: false,
                timer: 1500
            })
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

	}
});