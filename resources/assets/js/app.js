require('./bootstrap');
require('./funciones');
window.Vue = require('vue');
Vue.component('municipios', require('./components/municipios/municipios.vue'));
Vue.component('municipios-tabla', require('./components/municipios/tabla.vue'));
Vue.component('regiones', require('./components/regiones/regiones.vue'));
Vue.component('regiones-tabla', require('./components/regiones/tabla.vue'));
Vue.component('up', require('./components/ups/up.vue'));
Vue.component('up-tabla', require('./components/ups/tabla.vue'));
Vue.component('ur', require('./components/urs/ur.vue'));
Vue.component('ur-tabla', require('./components/urs/tabla.vue'));
Vue.component('ueg', require('./components/uegs/ueg.vue'));
Vue.component('ueg-tabla', require('./components/uegs/tabla.vue'));
Vue.component('cog', require('./components/cogs/cog.vue'));
Vue.component('cog-tabla', require('./components/cogs/tabla.vue'));
Vue.component('tpg', require('./components/tpgs/tpg.vue'));
Vue.component('tpg-tabla', require('./components/tpgs/tabla.vue'));
Vue.component('uog', require('./components/uogs/uog.vue'));
//Componentes Boostrap-Vue
Vue.component('tabla', require('./components/layouts/table.vue'));
Vue.component('modal', require('./components/layouts/modal.vue'));
Vue.component('paginator', require('./components/layouts/paginator.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	año: new Date().getFullYear(),
    	años: [
    		2017,2016,2015,2014,2013,2012,2010
    	]
    },
    methods:{
    	changeAño(año) {
    		this.año = año;
    	}
    }
});