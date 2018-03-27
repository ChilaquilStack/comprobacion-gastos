<script>
	export default {

		template: '#tabla',

		props: ['cogs'],

		data() {
			return {
				cog: ''
			}
		},

		methods: {
			
			buscar() {
				this.$emit('buscar', this.cog);
			}
		}
	}
</script>