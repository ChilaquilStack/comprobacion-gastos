<script>
	export default {
		props:['uegs'],
		template: '#tabla',
		methods: {
			baja(ueg){
				this.$emit('eliminar', ueg);
			},
			editar(ueg){
				this.$emit('editar', ueg);
			},
			agregar(){
				this.$emit('agregar');
			}
		}
	}
</script>