<script>

	export default {
		
		template: '#tabla',

		props:['ups'],

		data() {
			return {
				up: ''
			}
		},

		methods: {
			
			agregar(){
				this.$emit("agregar");
			},
			
			editar(up){
				this.$emit("editar", up);
			},
			
			eliminar(up){
				this.$emit('eliminar', up);
			},
			
			buscar(){
				this.$emit('buscar', this.up);
			}
		}
	}
</script>