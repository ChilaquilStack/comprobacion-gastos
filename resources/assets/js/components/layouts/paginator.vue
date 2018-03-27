<script>
	export default {
		template: '#paginator',
		
		props:['pagination', 'offset'],
		
		computed: {
			isActived() {
                return this.pagination.current_page;
            },
			pagesNumber() {
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

		methods:{
			changePage(page) {
				this.$emit('changepage', page)
			}
		}
	}
</script>