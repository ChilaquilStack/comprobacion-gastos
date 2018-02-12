<script>
	export default {

		template: '#up',

		created() {
			this.obtener_ups(this.pagination.current_page);
		},

		data() {
			return {
				isEditing: true,
				ups: [],
				up: {
					clave: '',
					descripcion: '',
					año: 2018
				},
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				errors: {
					'clave': [],
					'descripcion': [],
					'año': []
				},
				title_modal: '',
				action:{
					save: true,
					update: false
				}
			}
		},

		computed: {
			
			isActived() {
				return this.pagination.current_page;
	        },

	        pagesNumber() {
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
	    },

	    methods: {
	    	
	    	obtener_ups(page) {
	    		let url = `up/ups?page=${page}`;
	    		axios(url).then(response => {
	    			this.pagination = response.data.pagination;
	    			this.ups = response.data.data.data;
	    		})
			},

			guardar_up() {
				let url = 'up';
				if(this.validar_up(this.up)){
					axios.post(url, this.up)
					.then(response => {
						$("#agregar_up").modal('hide');
						message_alert(response.data, 'success');
						this.obtener_ups(this.pagination.current_page);
					}).catch(error => this.errors = error.response.data.errors);
				}
			},

			eliminar_up(up) {
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
	                		message_alert(response.data, 'success')
	                		this.obtener_ups(this.pagination.current_page);
						});
	                } else if (result.dismiss === 'cancel') {
	                    message_alert('Operacion cancelada', 'error')
	                }
	            })
			},

			editar_up(up) {
				this.title_modal = `Editar Unidad Presupuestal ${up.clave}`;
				this.up = Object.assign({}, up);
				this.action.save = false;
				this.action.update = true;
				this.limpiar_errores(this.errors);
				$("#agregar_up").modal();
			},

			actualizar_up(){
				let url = `up/${this.up.id}`;
				if(this.validar_up(this.up)){
					axios.put(url, this.up).then(response => {
						$("#agregar_up").modal('hide');
						message_alert(response.data, 'success');
						this.obtener_ups(this.pagination.current_page);
					}).catch(error => this.errors = error.response.data.errors);
				}
			},

			agregar_up() {
				this.title_modal = 'Agregar Unidad Presupuestal';
				this.action.save = true;
				this.action.update = false;
				this.limpiar_unidad(this.up);
				this.limpiar_errores(this.errors);
				$("#agregar_up").modal();
			},

			buscar_up(up){
				let url = 'up/buscar';
				axios.post(url, {'clave':up}).then(response => this.ups = response.data);
			},

			validar_up(up) {
				if(up.clave == '' || up.clave == null) {
					this.errors['clave'] = [];
					this.errors['clave'].push('Ingrese una clave');
					return false;
				} else {
					this.errors['clave'] = [];
				}
				if (up.clave.length != 2){
					this.errors['clave'] = [];
					this.errors['clave'].push('La clave debe ser de 2 digitos');
					return false;
				} else {
					this.errors['clave'] = [];
				}
				if(up.descripcion == '' || up.descripcion == null) {
					this.errors['descripcion'].push('Ingrese una descripción');
					return false;
				} else {
					this.errors['descripcion'] = [];
				}
				if(up.año == '' || up.año == null) {
					this.errors['año'].push('Ingrese un año');
					return false;
				} else {
					this.errors['año'] = [];
				}
				return true;
			},

			limpiar_unidad(objeto){
				objeto.clave = '';
				objeto.descripcion = '';
			},

			limpiar_errores(objeto){
				for(let i in objeto){
					objeto[i] = [];
				}
			},

			modal(title, type){
				swal({
					'title': title,
					'type': type,
					'showCloseButton': false,
			        'showConfirmButton': false,
			        'focusConfirm': false,
			        'timer': 1500
			    });
			},
			
			changePage: function (page) {
				$("#tbody").fadeOut('fast');
				this.obtener_ups(page);
				this.pagination.current_page = page;
				$("#tbody").fadeIn('fast');
	      	},
		}
	}
</script>