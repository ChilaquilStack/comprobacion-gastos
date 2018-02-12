<script>
	export default {
		props:['municipios'],
		template: '#tabla',
		data(){
			return {
				municipio: ''
			}
		},
		methods: {
			baja(municipio){
				this.$emit('eliminarmunicipio', municipio);
			},
			editar(municipio){
				this.$emit('editarmunicipio', municipio);
			},
			agregar(municipio){
				this.$emit('agregarmunicipio', municipio);
			},
			buscar(){
				this.$emit('buscarmunicipio', this.municipio);
			}
		}
	}
</script>