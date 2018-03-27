<script>
	export default {
		props:['regiones'],
		template: '#tabla',
		data(){
			return{
				region: ''
			}
		},
		methods:{
			agregar(){
				this.$emit('agregarregion');
			},
			editar(region){
				this.$emit('editarregion', region);
			},
			eliminar(region){
				this.$emit('eliminarregion', region);
			},
			buscar(){
				this.$emit('buscarregion', this.region);
			}
		}
	}
</script>