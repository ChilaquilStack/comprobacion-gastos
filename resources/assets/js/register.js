new Vue({

	'el': '#register',
	
	'data': {

		'usuario': {'nombre': '', 'apellido_paterno': '', 'apellido_materno': '', 'email': '', 'password': '', 'password_confirmation': ''},
		'errors': []

	},
	'methods': {

		'register': function () {
			axios.post('usuario', this.usuario).then(response => {
				$("#register").modal('hide');
				this.usuario.nombre = '';
				this.usuario.apellido_paterno = '';
				this.usuario.apellido_materno = '';
				this.usuario.email = '';
				this.usuario.password = '';
				this.usuario.password_confirmation = '';
				this.errors = [];
				this.modal(response.data, 'success');
			}).catch(error => this.errors = error.response.data.errors);
		}

	}
});