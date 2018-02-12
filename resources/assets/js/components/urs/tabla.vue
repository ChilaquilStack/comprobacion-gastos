<script>
	export default{
		template: '#tabla',
		props:['urs'],
		methods:{
			editar(ur){
				this.$emit('editar', ur);
			},
			eliminar(ur){
				this.$emit('eliminar', ur);
			},
			agregar(){
				this.$emit('agregar');
			}
		}
	}
</script>