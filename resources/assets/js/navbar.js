var fecha = new Date();
const navbar = new Vue({
	
	'el': '#navbar',
	
	'data': {
		'año_actual': fecha.getFullYear(),
	},

	'methods': {
		'changeYear': function (año) {
			this.año_actual = año;
		},
		'login': function () {
			$("#login").modal();
		},
		'register': function () {
			$("#register").modal();
		}
	},

	'computed': {
		'años': function () {
			let años = [];
			for(let año = 2005; año <= fecha.getFullYear(); año++) {
				años.push(año);
			}
			return años.reverse();
		}
	}
});