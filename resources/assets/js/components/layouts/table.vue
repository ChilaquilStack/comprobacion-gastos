<script>
	export default {
		template: '#table',

		props:['title'],

		methods:{
			agregar(){
				this.$emit('agregar');
			}
		}
	}
</script>