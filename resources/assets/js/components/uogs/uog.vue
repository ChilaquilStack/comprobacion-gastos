<script>
	export default {
		
		template: '#uog',

		created(){
			this.obtener_uogs(this.pagination.current_page);
			this.obtener_municipios();
			this.obtener_uegs();
		},
		
		data(){
			return{
				uog:{
					nombre: '',
					municipios_id: '',
					ueg_id: ''
				},
				uogs: [],
				municipios: [],
				uegs: [],
				title_modal: '',
				action:{
					save: true,
					update: false
				},
				errors:{
					nombre:[],
					municipios_id: [],
					ueg_id: []
				},
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},	
			}
		},

		methods: {

			obtener_uogs(page){
				let url = `uog/uogs?page=${page}`;
				axios.get(url).then(response => {
					this.pagination = response.data.pagination;
					this.uogs = response.data.data.data;
				});
			},

			agregar() {
				let title = "Agregar Unidad Operadora del Gasto"
				this.setOptionModal(title, true);
			},

			guardar(){
				axios.post('uog', this.uog).then(response => this.errors = response.data);
			},

			editar(uog) {
				let title = `Editar Unidad Operadora del Gasto ${uog.id}`
				this.setOptionModal(title, false);
			},

			actualizar(){

			},

			eliminar(){

			},

			buscar(){

			},

			obtener_municipios(){
				let url = 'municipio/municipios_all';
				axios.get(url).then(response => this.municipios = response.data);
			},

			obtener_uegs(){
				//Unidades Ejecutoras del Gasto
				let url = 'ueg/uegs_all';
				axios.get(url).then(response => this.uegs = response.data);	
			},

			setOptionModal(title, action, ){
				this.title_modal = title;
				this.action.save = action;
				this.action.update = !this.action.save
				$('#agregar_uog').modal();
			}

		}
	}
</script>