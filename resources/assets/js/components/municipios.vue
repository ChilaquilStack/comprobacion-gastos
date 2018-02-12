<template>
	
</template>

<script>
	'created': function() {
		this.obtener_municipios(this.pagination.current_page);
        this.obtener_regiones();
	},
    
	'data': {
		'old_municipio': { 'id': '','nombre': ''},
        'buscar_municipio':'',
        'municipio': {'nombre': '', 'regiones_id': ''},
        'municipios': [],
        'regiones': [],
        'pagination': {
            'total': 0, 
            'per_page': 2,
            'from': 1,
            'to': 0,
            'current_page': 1
        },
        'offset': 5,
	},
        
    'computed': {
        
        'isActived': function () {
            return this.pagination.current_page;
        },
        
        'pagesNumber': function () {
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

        'searchMunicipio': function() {
            return this.municipios.filter((municipio) => municipio.nombre.includes(this.buscar_municipio));
        }
        
    },
    
    'methods': {
    
        'mostrar_formulario_agregar_municipio': function(){
            $("#agregar_municipio").modal();
        },

        'agregar_municipio': function() {
            if(this.validar_municipio(this.municipio)) {
                let url = 'municipio';
                axios.post(url, this.municipio)
                .then(response => { 
                    modal(response.data, 'success');
                    this.obtener_municipios();
                    this.municipio.nombre = "";
                    this.municipio.regiones_id = "";
                    $("#agregar_municipio").modal('hide');
                }).catch(error => {
                    modal_(error.data, 'error');
                });
            }
        },

        'validar_municipio': function(municipio) {
            if(municipio.nombre == '') {
                modal("Ingrese el nombre del municipio", 'info');
                return false;
            }
            if(municipio.regiones_id == '') {
                modal('Ingrese la region a la que pertenece el municipio de ' + municipio.nombre, 'info');
                return false;
            }
            return true;
        },
        
        'eliminar_municipio': function(municipio) {
            let url = 'municipio/' + municipio.id;
            swal({
                title: 'Esta Seguro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'No, cancelar!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    axios.delete(url).then(response => {
                        modal("Eliminado", "success");
                        this.obtener_municipios(this.pagination.current_page);
                    }).catch(error => modal('Error', 'error'));
                } else if (result.dismiss === 'cancel') {
                    modal('Errror', 'errror');
                }
            })
        },

        'obtener_municipios': function(page) {
            let url = 'municipio/municipios?page='+page;
            axios.get(url).then(response => {
                this.pagination = response.data.pagination;
                this.municipios = response.data.data.data;
            });
        },

        'obtener_regiones': function() {
            let url = 'region/regiones_all';
            axios.get(url).then(response => this.regiones = response.data);
        },

        'editar_municipio': function(municipio) {
            this.old_municipio.id = municipio.id
            this.old_municipio.nombre = municipio.nombre;
            $("#editar_municipio").modal();
        },

        'actualizar_municipio': function(municipio) {
            if(municipio.nombre != '') {
                let url = 'municipio/' + municipio.id;
                axios.put(url, {'nombre': municipio.nombre})
                    .then(response => {
                        this.obtener_municipios(this.pagination.current_page);
                        $("#editar_municipio").modal('hide');
                        modal(response.data, 'success');
                })
                    .catch(error => {
                        modal(error.data, 'error')
                });
            } else {
                modal("Alerta", "Porfavor ingrese el nombre del municipio", 'info');
            }
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.obtener_municipios(page);
        },
    }
</script>