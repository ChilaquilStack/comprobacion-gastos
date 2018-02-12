<script>
	export default {
		template: '#tabla',

		props:['tpgs'],

		methods: {
			agregar(){
				this.$emit("agregar");
			},
			editar(tpg){
				this.$emit("editar", tpg);
			},
			eliminar(tpg){
				this.$emit('eliminar', tpg);
			}
		}
	}
</script>