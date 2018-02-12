<script>
	export default {

		template: '#tpg',

		created: function() {
			this.obtener_tpgs(this.pagination.current_page);
		},

		data(){
			return {
				tpgs: [],
				tpg: {
					descripcion: ''
				},
				old_tpg: {
					id: '',
					descripcion: '',
					año: ''
				},
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				errores: {},
				title_modal: '',
				action:{
					update: false,
					save: true
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

			agregar_tpg: function () {
				this.title_modal = 'Agregar Tipo de Programa General';
				this.action.save = true;
				this.action.update = false;
				this.tpg.descripcion = '';
				$("#agregar_tpg").modal();
			},

			obtener_tpgs(page) {
				let url = 'tpg/tpgs?page' + page;
				axios(url).then(response => {
					this.pagination = response.data.pagination;
					this.tpgs = response.data.data.data;
				});
			},

			guardar_tpg(){
				let url = 'tpg';
				if(this.validar_tpg(this.tpg)) {
					axios.post(url, this.tpg)
					.then(response => {
						message_alert(response.data, 'success');
						$("#agregar_tpg").modal('hide');
						this.obtener_tpgs(this.pagination.current_page);
						this.up.descripcion = '';
					})
					.catch(error => {
						this.errores = error.response.data.errors;
					});
				}
			},

			eliminar_tpg(tpg){
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
	                		message_alert(response.data, 'success')
	                		this.obtener_tpgs(this.pagination.current_page);
	                	}).catch(error => {
	                		modal("Error", 'error');
						});
	                } else if (result.dismiss === 'cancel') {
	                    modal("Operacion cancelada", 'error')
	                }
	            })
			},

			editar_tpg(tpg) {
				this.title_modal = `Editar Tipo de Programa General ${tpg.id}`;
				this.action.save = false;
				this.action.update = true;
				this.tpg = Object.assign({}, tpg);
				$("#agregar_tpg").modal();
			},
			
			actualizar_tpg(){
				let url = `tpg/${this.tpg.id}`;
				if(this.validar_tpg(this.tpg)){
					axios.put(url, this.tpg).then(response => {
						$("#agregar_tpg").modal('hide');
						message_alert(response.data, 'success');
						this.obtener_tpgs(this.pagination.current_page);
					}).catch(error => {
						this.errores = error.response.data.errros;
					});
				}
			},

			validar_tpg(tpg) {
				if(tpg.descripcion == '') {
					this.errores['descripcion'].push('Ingrese una descripcion');
					return false;
				} 
				return true;
			},

			changePage(page){
				this.pagination.current_page = page;
				this.obtener_tpgs(page);

			},
		}
	}
</script>