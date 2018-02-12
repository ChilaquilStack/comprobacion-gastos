<script>
	
	export default {

		template: '#regiones',
		
		created() {
			this.obtener_regiones(this.pagination.current_page);
		},

		data(){
			return {
				region: {nombre: ""},
				regiones: [],
				pagination: {
					total: 0,
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				errors: {
					'region.nombre': []
				},
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

        	'pagesNumber'() {
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

			agregar_region() {
				this.title_modal = 'Agregar Region';
				this.region.nombre = '';
				this.errors['region.nombre'] = [];
				this.action.save = true;
				this.action.update = false;
				$("#agregar_region").modal();
			},

			guardar_region() {
				if(this.validar_region(this.region)){
					let url = 'region';
					axios.post(url, this.region).then(response => {
						message_alert(response.data, 'success');
						this.obtener_regiones();
						this.region.nombre = "";
						$("#agregar_region").modal('hide');
					});
				} 
			},

			validar_region: function (region){
				if(region.nombre == ''){
					this.errors['region.nombre'].push('Ingrese un nombre para la region');
					return false
				}
				return true;
			},

			eliminar_region(region) {
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
						let url = 'region/' + region.id;
						axios.delete(url)
						.then(response => {
							message_alert(response.data, 'success');
							this.obtener_regiones(this.pagination.current_page);
						});
					} else if (result.dismiss === 'cancel') {
						message_alert("Accion Cancelada", 'error')
					}
				})
			},

			obtener_regiones(page) {
				let url = 'region/regiones?page='+page;
				axios.get(url)
				.then(response => {
					this.pagination = response.data.pagination;
					this.regiones = response.data.data.data;
				})
			},

			editar_region(region) {
				this.title_modal = "Editar Region";
				this.region = Object.assign({}, region);
				this.action.update = true;
				this.action.save = false;
				$("#agregar_region").modal();
			},
			
			actualizar_region(region){
				if(region.nombre != ''){
					let url = `region/${this.region.id}`;
					axios.put(url, this.region)
						.then(response => {
							this.obtener_regiones(this.pagination.current_page);
							$("#agregar_region").modal('hide');
							message_alert(response.data, 'success');
					}).catch(error => console.log('Error', error));
				}
			},

			buscar_region(region){
				let url = 'region/buscar'
				axios.post(url, {'nombre': region}).then(response => this.regiones = response.data);
			},

			changePage(page) {
				this.pagination.current_page = page;
				this.obtener_regiones(page);
	      	},
		}
	}
</script>