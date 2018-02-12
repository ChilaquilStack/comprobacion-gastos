<script>
	export default {

		template: '#ueg',

		created(){
			this.obtener_urs();
			this.obtener_uegs(this.pagination.current_page);
		},

		data() {
			return {
				buscar_ueg: '',
				urs: [],
				uegs: [],
				ueg: {
					clave: '',
					descripcion: '',
					año: 2018,
					ur_id: ''
				},
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				errores: {
					clave: [],
					descripcion: [],
					ur_id: []
				},
				action: {
					save: true,
					update: false
				},
				title_modal: ''
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
	        }
	    },

		methods:{

			guardar_ueg(){
				let url = 'ueg';
				if(this.validar_ueg(this.ueg)){
					axios.post(url, this.ueg).then(response => {
						$("#agregar_ueg").modal('hide');
						this.obtener_uegs(this.pagination.current_page);	
						message_alert(response.data,'success');
					}).catch(error => {
						this.errores = error.response.data.errors;
					});
				}
			},

			eliminar_ueg(ueg){
				let url = 'ueg/' + ueg.id;
				axios.delete(url).then(response => {
					message_alert(response.data);
					this.obtener_uegs();
				}).catch(error => {
					console.log('Error');
				});
			},

			editar_ueg(ueg){
				this.title_modal = `Editar Unidad Ejecutora del Gasto ${ueg.clave}`;
				this.action.update = true;
				this.action.save = false;
				this.ueg = Object.assign({}, ueg);
				$("#agregar_ueg").modal();
			},

			actualizar_ueg(){
				let url = `ueg/${this.ueg.id}`;
				$('#agregar_ueg').modal('hide');
				axios.put(url, this.ueg).then(response => {
					message_alert(response.data, 'success');
					this.obtener_uegs(this.pagination.current_page);
				}).catch(error => this.errores = error.response.data.errors);
			},

			agregar_ueg(){
				this.title_modal="Agregar Unidad Ejecutora del Gasto";
				this.action.update = false;
				this.action.save = true;
				this.limpiar_unidad(this.ueg);
				this.limpiar_errors(this.errores)
				$("#agregar_ueg").modal();
			},

			obtener_uegs(page) {
				let url = `ueg/uegs?page=${page}`;
				axios.get(url).then(response => {
					this.pagination = response.data.pagination;
					this.uegs = response.data.data.data;
				})
			},

			obtener_urs() {
				let url = 'ur/urs_all';
				axios.get(url).then(response => this.urs = response.data);
			},

			validar_ueg(ueg) {
				if(ueg.clave == '') {
					this.errores['clave'] = [];
					this.errores['clave'].push('Ingrese una clave');
					return false;
				} else {
					this.errores['clave'] = [];
				}
				if (ueg.clave.length != 5){
					this.errores['clave'] = [];
					this.errores['clave'].push('La clave debe ser de 5 digitos');
					return false;
				} else {
					this.errores['clave'] = [];
				}
				if(ueg.descripcion == '') {
					this.errores['descripcion'] = [];
					this.errores['descripcion'].push('Ingrese una descripcion');
					return false;
				} else {
					this.errores['descripcion'] = [];
				}
				if(ueg.año == '') {
					this.errores['año'] = [];
					this.errores['año'].push('Ingrese un año');
					return false;
				} else {
					this.errores['año'] = [];
				}
				if(ueg.ur_id == ''){
					this.errores['ur_id'] = [];
					this.errores['ur_id'].push('Ingrese la unidad responsable');
					return false;
				} else{
					this.errores['ur_id'] = [];
				}
				return true;
			},

			limpiar_unidad(ur){
				ur.clave = '';
				ur.descripcion = '';
				ur.ur_id = ''
			},

			limpiar_errors(errors){
				for(let e in errors){
					errors[e] = [];
				}
			},

			changePage(page){
				this.pagination.current_page = page;
				this.obtener_uegs(page);
			},

		}
	}
</script>