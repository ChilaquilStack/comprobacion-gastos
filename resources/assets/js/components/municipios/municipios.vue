<script>
    export default {
        template:'#municipios',
    
        created: function() {
            this.obtener_municipios(this.pagination.current_page);
            this.obtener_regiones();
        },

        data() {
            return {
                municipio: {'nombre': '', 'regiones_id': ''},
                municipios: [],
                regiones: [],
                pagination: {
                    total: 0, 
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 5,
                errors: {
                    'municipio.nombre':[],
                    'municipio.regiones_id':[],
                },
                action:{
                    save: true,
                    update: false
                },
                title_modal: ''
            }
        },

        methods: {

            agregar_municipio() {
                this.title_modal = 'Agregar Municipio'
                this.action.save = true;
                this.action.update = false;
                $("#agregar_municipio").modal();
            },

            guardar_municipio() {
                if(this.validar_municipio(this.municipio)) {
                    let url = 'municipio';
                    axios.post(url, this.municipio)
                    .then(response => { 
                        message_alert   (response.data, 'success');
                        this.obtener_municipios(this.pagination.current_page);
                        this.municipio.nombre = "";
                        this.municipio.regiones_id = "";
                        $("#agregar_municipio").modal('hide');
                    }).catch(error => {
                        message_alert(error.data, 'error');
                    });
                }
            },

            validar_municipio(municipio) {
                if(municipio.nombre == '') {
                    this.errors['municipio.nombre'] = [];
                    this.errors['municipio.nombre'].push("Ingrese el nombre del municipio", 'info');
                    return false;
                } else{
                    this.errors['municipio.nombre'] = [];
                }
                if(municipio.regiones_id == '') {
                    this.errors['municipio.regiones_id'] = [];
                    this.errors['municipio.regiones_id'].push('Ingrese la region a la que pertenece el municipio de ' + municipio.nombre, 'info');
                    return false;
                } else {
                    this.errors['municipio.regiones_id'] = [];
                }
                return true;
            },

            eliminar_municipio(municipio) {
                let url = 'municipio/' + municipio.id;
                swal({
                    title: 'Esta Seguro?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, dar de baja!',
                    cancelButtonText: 'No, cancelar!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        axios.delete(url).then(response => {
                            message_alert(response.data, "success");
                            this.obtener_municipios(this.pagination.current_page);
                        }).catch(error => modal('Error', 'error'));
                    } else if (result.dismiss === 'cancel') {
                        message_alert('Accion Cancelada', 'error');
                    }
                })
            },

            obtener_municipios(page) {
                let url = 'municipio/municipios?page='+page;
                axios.get(url).then(response => {
                    this.pagination = response.data.pagination;
                    this.municipios = response.data.data.data;
                });
            },

            obtener_regiones(){
                let url = 'region/regiones_all';
                axios.get(url).then(response => this.regiones = response.data);
            },

            editar_municipio(municipio) {
                this.municipio = Object.assign({}, municipio);
                this.title_modal = 'Editar Municipio';
                this.action.update = true;
                this.action.save = false;
                $("#agregar_municipio").modal();
            },
            
            actualizar_municipio(){
                if(this.validar_municipio(this.municipio)) {
                    let url = 'municipio/' + this.municipio.id;
                    axios.put(url, {'nombre': this.municipio.nombre})
                        .then(response => {
                            message_alert(response.data, 'success');
                            this.obtener_municipios(this.pagination.current_page);
                            $("#agregar_municipio").modal('hide');
                    })
                }
            },

            buscar_municipio(municipio){
                let url = 'municipio/buscar'
                axios.post(url, {'nombre': municipio}).then(response => this.municipios = response.data);
            },

            changePage(page) {
                this.pagination.current_page = page;
                this.obtener_municipios(page);
            },

            modal(title, type) {
                swal({
                    'title': title,
                    'type': type,
                    'showCloseButton': false,
                    'showConfirmButton': false,
                    'focusConfirm': false,
                    'timer': 1500
                });
            }
        }
    }
</script>