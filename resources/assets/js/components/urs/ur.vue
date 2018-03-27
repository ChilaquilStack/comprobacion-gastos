<script>
	export default {

		template: '#ur',

		created(){
			this.obtener_ups();
			this.obtener_urs(this.pagination.current_page);
		},

		data(){
			return{
				ur_buscar: '',
				urs: [],
				ups: [],
				ur: {
					clave: '',
					descripcion: '',
					año: $("#año").val(),
					up_id: ''
				},
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				title_modal: '',
				errors: {
					clave: [],
					descripcion: [],
					up_id:[]
				},
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

    	methods:{

    		guardar_ur() {
				if(this.validar_ur(this.ur)){
					axios.post('ur', this.ur).then(response => {
						$("#agregar_ur").modal('hide');
						message_alert(response.data, 'success');
						this.obtener_urs(this.pagination.current_page);
					}).catch(error => this.errors = error.response.data.errors);
				}
			},

			eliminar_ur(ur) {
				let url = `ur/${ur.id}`;
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
	                		message_alert(response.data, 'success');
	                		this.obtener_urs(this.pagination.current_page);
	                	});
	                } else if (result.dismiss === 'cancel') {
	                    message_alert("Operacion cancelada", 'error')
	                }
	            })
			},

			editar_ur(ur) {
				this.title_modal = `Editar Unidad Responsable ${ur.clave}`;
				this.action.save = false
				this.action.update = true
				this.ur = Object.assign({},ur);
				this.limpiar_errors(this.errors);
				$("#agregar_ur").modal();
			},

			actualizar_ur() {
				let url = `ur/${this.ur.id}`;
				if(this.validar_ur(this.ur)){
					axios.put(url, this.ur).then(response => {
						$("#agregar_ur").modal('hide');
						message_alert(response.data, 'success');
						this.obtener_urs(this.pagination.current_page);
					}).catch(error => this.errors = error.response.data.errors);
				}
			},

			agregar_ur() {
				this.title_modal = 'Agregar Unidad Responsable';
				this.action.save = true;
				this.action.update = false;
				this.limpiar_unidad(this.ur);
				this.limpiar_errors(this.errors);
				$("#agregar_ur").modal();
			},

			obtener_ups() {
				axios('up/ups_all').then(response => this.ups = response.data);
			},

			obtener_urs(page) {
				let url = `ur/urs?page=${page}`;
				axios(url).then(response => {
					this.pagination = response.data.pagination;
					this.urs = response.data.data.data
				})
			},

			validar_ur(ur) {
				if(ur.clave == '') {
					this.errors['clave'] = [];
					this.errors['clave'].push('Ingrese una clave');
					return false;
				} else{
					this.errors['clave'] = [];
				}if (ur.clave.length != 3) {
					this.errors['clave'] = [];
					this.errors['clave'].push('La clave debe ser de 3 digitos')
					return false;
				} else {
					this.errors['clave'] = [];
				}
				if(ur.descripcion == '') {
					this.errors['descripcion'] = [];
					this.errors['descripcion'].push('Ingrese una descripcion');
					return false;
				} else{
					this.errors['descripcion'] = [];
				}
				if(ur.up_id == ''){
					this.errors['up_id'] = [];
					this.errors['up_id'].push('Seleccione una unidad presupuestal');
					return false;
				} else {
					this.errors['up_id'] = [];
				}
				if(ur.año == '') {
					this.errors['año'] = [];
					this.errors['año'].push('Ingrese un año');
					return false;
				} else{
					this.errors['año'] = [];
				}
				return true;
			},
		
			changePage(page) {
            	this.pagination.current_page = page;
            	this.obtener_urs(page);
        	},

        	modal(text, type) {
				swal({
					text:  text,
					type: type,
					showCloseButton: false,
					showConfirmButton: false,
					focusConfirm: false,
					timer: 1500
				});
			},

			limpiar_unidad(ur){
				ur.clave = '';
				ur.descripcion = '';
				ur.up_id = '';
			},

			limpiar_errors(errors){
				for(let i in errors){
					errors[i] = [];
 				}
			}
		}
	}
</script>