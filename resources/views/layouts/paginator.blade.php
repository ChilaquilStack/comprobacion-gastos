<script type="text/template" id="paginator">
    <nav aria-label="Page navigation" v-if="pagination.total > offset">
        <ul class="pagination">
            <li v-if="pagination.current_page">
                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pagesNumber" :class="[page == isActived ? 'active' : '']">
                <a href="#" @click.prevent="changePage(page)" v-text="page"></a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page">
                <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                    <span aria-hidden="true">»</span>
                </a>
          </li>
        </ul>
    </nav>
</script>