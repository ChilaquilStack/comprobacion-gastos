<script>
	export default {
		
		template: '#cog',

		mounted(){
			this.obtener_cogs(this.pagination.current_page);
		},

		data(){
			return {
				cogs: [],
				pagination: {
					total: 0, 
					per_page: 2,
					from: 1,
					to: 0,
					current_page: 1
				},
				offset: 5,
				conceptos: [
					{
						id: 2100, 
						nombre: 'Materiales De Administracion, Emision de Documentos y Articulos Oficiales',
						partidas:[
							{
								id:2111,
								nombre: 'Materiales Utiles y Equipos Menores de Oficina'
							},
							{
								id: 2121,
								nombre: 'Materiales y Utiles de Impresion y Reproducion'
							},
							{
								id: 2131,
								nombre: 'Material estadistico y Geografico'
							},
							{
								id: 2141,
								nombre: 'Materiales Utiles y Equipo Menores de Tecnologia de la Informacion y Comunucaciones'
							},
							{
								id: 2151,
								nombre: 'Material Impreso e Informacion Digital'
							},
							{
								id: 2161,
								nombre: 'Material de Limpieza'
							},
							{
								id: 2171,
								nombre: 'Materiales y Utilez de Enseñanza'
							},
							{
								id: 2181,
								nombre: 'Materiales para el Registro e Identificacion de Bienes y Personas'
							},
							{
								id: 2182,
								nombre: 'Registro e Identificacion Vehicular'
							}
						]
					},
					{
						id: 2200,
						nombre: 'Alimentos y Utensilios',
						partidas: [
							{
								id: 2211,
								nombre: 'Productos Alimenticios para los efectivos que participan en programas de Segunda Publicidad'
							},
							{
								id: 2212,
								nombre: 'Productos Alimenticios para personas derivador de la Prestacion de Servicios Publicos en Unidades de 	'
							},
							{
								id: 2213,
								nombre: 'Productos Alimenticios para el personal que realiza labores en campo o de Supervicion'
							},
							{
								id: 2214,
								nombre: 'Productos Alimenticios para el Personal en las Instalaciones de las Dependencias y Entidades'
							},
							{
								id: 2215,
								nombre: 'Productos Alimenticios para la Poblacion en Caso de Desaste Natural'	
							},
							{
								id: 2216,
								nombre: 'Productos Alimenticios para el personal Derivado de Actividades Extraordinarias'
							},
							{
								id: 2221,
								nombre: 'Productos Alimenticios para Animales'
							},
							{
								id: 2231,
								nombre: 'Utensilios para el servicio de Alimentacion'
							}
						]
					},
					{
						id: 2300,
						nombre: 'Materias Primas y Materiales de Produccion y Comercializacion',
						partidas: [
							{
								id: 2311,
								nombre: 'Productos Alimenticios, Agropecuarios y Forestales Adquiridos como Materia Prima'
							},
							{
								id: 2321,
								nombre: 'Insumos Textiles Adquiridos como Materia Prima'
							},
							{
								id: 2331,
								nombre: 'Producto de Papel, Carton e Impresos Adquiridos como Materia Prima'
							},
							{
								id: 2351,
								nombre: 'Productos Quimicos, Farmaceuticos y de Laboratorio Adquiridos como Materia Prima'
							},
							{
								id: 2371,
								nombre: 'Productos de Cuero, Piel, Plastico y Hule Adquiridos como Materia Prima'
							},
							{
								id: 2391,
								nombre: 'Otros Productos Adquiridos como Materia Prima'
							}
						],
					},
					{
						id: 2400,
						nombre: 'Materiales y Articulos de Construcion y de Reparacion',
						partidas: 
						[
							{ id: 2411, nombre: 'Productos Minerales no Metalicos' },
							{ id: 2421, nombre: 'Cemento y Productos de Concreto' },
							{ id: 2431, nombre: 'Cal, Yeso y Productos de Yeso' },
							{ id: 2441, nombre: 'Madera y Productos de Madera' },
							{ id: 2451, nombre: 'Vidrio y Productos de Vidrio' },
							{ id: 2461, nombre: 'Material Electrico y Electronico' },
							{ id: 2471, nombre: 'Articulos Metalicos para la Construcion' },
							{ id: 2481, nombre: 'Materiales Complementarios' },
							{ id: 2491, nombre: 'Otros Materiales y Articulos de Construcion y Reparacion'}
						]
					},
					{
						id: 2500,
						nombre: 'Productos Quimicos, Farmaceuticos y de Laboratorio',
						partidas: 
						[
							{ id: 2511, nombre: 'Productos Quimicos Basicos' },
							{ id: 2521, nombre: 'Fertilizantes, Pesticidas y Otros Agroquimicos'},
							{ id: 2531, nombre: 'Medicinas y Productos Farmaceuticos'},
							{ id: 2541, nombre: 'Materiales, Accesorios y Suministros Medicos'},
							{ id: 2551, nombre: 'Materiales, Accesorios y Suministros de Laboratorio'},
							{ id: 2561, nombre: 'Fibras Sinteticas, Hules, Plasticos y Derivados'},
							{ id: 2591, nombre: 'Otros Productos Quimicos'}
						]
					},
					{
						id: 2600,
						nombre: 'Combustibles, Lubricantes y Aditivos',
						partidas: 
						[
							{id: 2611, nombre: 'Combustibles, Lubricantes, y Aditivos para Vehiculos Destinados a Servicios Publicos y a la Operacion de'},
							{id: 2612, nombre: 'Combustibles, Lubricantes y Aditivos para Vehiculos destinados a Servicio Administrativos'},
							{id: 2613, nombre: 'Combustibles, Lubricantes y Aditivos para Vehiculos Asignados a Servidores Publicos'},
							{id: 2614, nombre: 'Combustibles, Lubricantes y Aditivos para Maquinaria y Equipo de Produccion'}
						]
					},
					{
						id: 2700,
						nombre: 'Vestuario, Blancos, Prendas de Proteccion y Articulos Deportivos',
						partidas: 
						[
							{id: 2711, nombre: 'Vestuario y Uniformes'},
							{id: 2721, nombre: 'Prendas de Seguridad y Proteccion Personal'},
							{id: 2731, nombre: 'Articulos Deportivos'},	
							{id: 2741, nombre: 'Productos Textiles'},
							{id: 2751, nombre: 'Blancos y Otros Productos Textiles, Excepto prendas de Vestir'}

						]
					},
					{
						id: 2800,
						nombre: 'Materiales y Suministros para la Seguridad',
						partidas: 
						[
							{ id: 2821, nombre: 'Materiales de Seguridad Publica'},
							{ id: 2831, nombre: 'Prendas de Proteccion para la Seguridad Publica'}
						]
					},
					{
						id: 2900,
						nombre: 'Herramientas, Refacciones y Accesorios Menores',
						partidas: 
						[
							{id: 2911, nombre: 'Herramientas Menores'},

							{id: 2921, nombre: 'Refacciones y Accesorios menores de Edificios'},

							{id: 2931, nombre: 'Refacciones y Accesorios menores de Mobiliario'},

							{id: 2941, nombre: 'Refacciones y Accesorios Menores para Equipo de Computo y Telecomunicaciones'},
							
							{id: 2951, nombre: 'Refacciones y Accesorios menores de Equipo e Instrumental Medico y de Laboratorio'},
							
							{id: 2961, nombre: 'Refacciones y Accesorios Menores de Equipo de Transporte'},
							
							{id: 2971, nombre: 'Refacciones y Accesorios Msenores de Equipo de Defensa y Seguridad'},

							{id: 2981, nombre: 'Refacciones y Accesorios Menores de Maquinaria y Otros Equipos'},	

							{id: 2991, nombre: 'Refacciones y Accesorios Menores Otros Bienes Muebles'}
						]
					},
					{
						id: 3100,
						nombre:'Servicios Basicos',
						partidas: [
							{id: 3111, nombre: 'Servicio de Energia Electrica'},
							{id: 3112, nombre: 'Servicio Alumbrado Publico'},
							{id: 3121, nombre: 'Servicio de Gas'},
							{id: 3131, nombre: 'Servicio de Agua'},
							{id: 3141, nombre: 'Servicio Telefonico Tradicional'},
							{id: 3151, nombre: 'Servicio de Telefonia Celular'},
							{id: 3161, nombre: 'Servicio de Telefonia Celular'},
							{id: 3171, nombre: 'Servicio de Acceso a Internet, Redes y Procesamiento de Informacion'},
							{id: 3181, nombre: 'Servicio Postal'},
							{id: 3182, nombre: 'Servicio Telegrafico'},
							{id: 3191, nombre: 'Servicios Integrales de Telecomunicaciones'},
							{id: 3192, nombre: 'Servicios Integrales de Infraestructura de Computo'},
							{id: 3193, nombre: 'Contratacion de Otros Servicios'},
						]
					},
					{
						id: 3200,
						nombre: 'Servicios de Arrendamiento',
						partidas: [
							{id: 3211, nombre: 'Arrendamiento de Terreno'},

							{id: 3221, nombre: 'Arrendamiento de Edificios'},

							{id: 3231, nombre: 'Arrendamiento de Mobiliario y Equipo de Administracion, Educacion y Recreativo'},

							{id: 3232, nombre: 'Arrendamiento de Equipo y Bienes Informaticos'},

							{id: 3241, nombre: 'Arrendamiento de Equipo e Instrumental medico y de Laboratorio'},

							{id: 3251, nombre: 'Arrendamiento de Vehiculos ter'},

							{id: 3252, nombre: 'Arrendamiento de vehículos terrestres, aéreos, marítimos, lacustres y fluviales para servicios admin'},

							{id: 3254, nombre: 'Arrendamiento de vehículos terrestres, aéreos, marítimos, lacustres y fluviales para servidores públicos'},

							{id: 3261, nombre: 'Arrendamiento de maquinaria, otros equipos y herramientas'},

							{id: 3211, nombre: 'Arrendamiento de terrenos</option><option'}, 

							{id: 3271, nombre: 'Patentes, regalías y otros'},

							{id: 3281, nombre: 'Arrendamiento financiero'},

							{id: 3291, nombre: 'Arrendamientos especiales'},

							{id: 3293, nombre: 'Otros Arrendamientos'}
						]	
					},
					{
						id: 3300,
						nombre: 'Servicios Profesionales, Cientificos, Tecnicos y Otros Servicios',
						partidas: [
							{id: 3311, nombre: 'Servicios legales, de contabilidad, auditoría y relacionados'},
							{id: 3321, nombre: 'Servicios de diseño, arquitectura, ingeniería y actividades relacionadas'},
							{id: 3331, nombre: 'Servicios de consultoría administrativa e informática'},
							{id: 3341, nombre: 'Capacitación institucional'},
							{id: 3342, nombre: 'Capacitación especializada'},
							{id: 3351, nombre: 'Servicios de investigación científica y desarrollo'},
							{id: 3361, nombre: 'Servicios de apoyo administrativo'},
							{id: 3362, nombre: 'Servicio de Impresión de documentos y papelería oficial'},
							{id: 3363, nombre: 'Servicios de impresión de material informativo derivado de la operación y administración'},
							{id: 3364, nombre: 'Servicios relacionados con transcripciones'},
							{id: 3365, nombre: 'Información en medios masivos derivada de la operación y administración de las dependencias y entida'},
							{id: 3366, nombre: 'Servicios de digitalización'},
							{id: 3371, nombre: 'Servicios de protección y seguridad'},
							{id: 3381, nombre: 'Servicios de vigilancia'},
							{id: 3391, nombre: 'Servicios profesionales, científicos y técnicos integrales'}
						]
					},
					{
						id: 3400,
						nombre: 'Servicios Financieros, Bancarios, y Comerciales',
						partidas: [
							{id: 3411, nombre: 'Servicios financieros y bancarios'},
							{id: 3431, nombre: 'Servicios de recaudación, traslado y custodia de valores'},
							{id: 3441, nombre: 'Seguro de responsabilidad patrimonial del Estado'},
							{id: 3451, nombre: 'Seguros de bienes patrimoniales'},
							{id: 3461, nombre: 'Almacenaje, embalaje y envase'},
							{id: 3471, nombre: 'Fletes y maniobras'},
							{id: 3491, nombre: 'Servicios financieros, bancarios y comerciales integrales'}
						]
					},
					{
						id: 3500,
						nombre: 'Servicios de Instalacion, Reparacion, Mantenimiento y Conservacion',
						partidas: [
							{id: 3511, nombre: ' Mantenimiento y conservación menor de inmuebles para la prestación de servicios administrativos'},
							{id: 3512 , nombre: 'Mantenimiento y conservación menor de inmuebles para la prestación de servicios públicos'},
							{id: 3521, nombre: 'Mantenimiento y conservación de mobiliario y equipo de administración, educacional y recreativo'},
							{id: 3531, nombre: 'Instalación, reparación y mantenimiento de equipo de cómputo y tecnologías de la información'},
							{id: 3541, nombre: 'Instalación, reparación y mantenimiento de equipo e instrumental médico y de laboratorio'},
							{id: 3551, nombre: 'Mantenimiento y conservación de vehículos terrestres, aéreos, marítimos, lacustres y fluviales'},
							{id: 3561, nombre: 'Reparación y mantenimiento de equipo de defensa y seguridad'},
							{id: 3571, nombre: 'Instalación, reparación y mantenimiento de maquinaria y otros equipos'},
							{id: 3572, nombre: 'Mantenimiento y conservación de maquinaria y equipo de trabajo específico'},
							{id: 3581, nombre: 'Servicios de limpieza y manejo de desechos'},
							{id: 3591, nombre: 'Servicios de jardinería y fumigación'}
						]
					},
					{
						id: 3600,
						nombre: 'Servicios de Comunucacion Social y Publicidad',
						partidas: 
							[

								{ id: 3611, nombre: 'Difusión por radio, televisión y otros medios de mensajes sobre programas y actividades gubernamenta' },
							
								{ id: 3621, nombre: 'Difusión por radio, televisión y otros medios de mensajes comerciales para promover la venta de bien' },
							
								{ id: 3631, nombre: 'Servicios de creatividad, preproducción y producción de publicidad, excepto internet' },

								{ id: 3641, nombre: 'Servicios de revelado de fotografías</option><option value="139">3651 Servicios de la industria fílmica, del sonido y del video' },

								{ id: 3661, nombre: 'Servicio de creación y difusión de contenido exclusivamente a través de internet' },

								{ id: 3691, nombre: 'Otros servicios de información' }
						]
					},
					{
						id: 3700,
						nombre: 'Servicios de Traslado y Viaticos',
						partidas: 
							[
								{ id: 3711, nombre: 'Pasajes aéreos nacionales'},

								{ id: 3712, nombre: 'Pasajes aéreos internacionales'},
								
								{ id: 3721, nombre: 'Pasajes terrestres nacionales'},
								
								{ id: 3722, nombre: 'Pasajes terrestres internacionales'},
								
								{ id: 3741, nombre: 'Autotransporte'},
								
								{ id: 3751, nombre: 'Viáticos en el país'},
								
								{ id: 3761, nombre: 'Viáticos en el extranjero'},
								
								{ id: 3771, nombre: 'Gastos de instalación del personal estatal y traslado de menaje'},
								
								{ id: 3781, nombre: 'Servicios integrales de traslado y viáticos nacionales para servidores, públicos en el desempeño'},
								
								{ id: 3782, nombre: 'Servicios integrales traslado y viáticos en el extranjero para servidores públicos en el desempeño'},
								
								{ id: 3791, nombre: 'Otros servicios de traslado y hospedaje'},
								
								{ id: 3792, nombre: 'Gastos para operativos y trabajos de campo en áreas rurales'},
							]
					},
					{
						id: 3800,
						nombre: 'Servicios Oficiales',
						partidas: 
							[
								{id: 3811, nombre: 'Gastos de ceremonial (Sólo cuando se contrate un servicio integral)'},
								{id: 3821, nombre: 'Gastos de orden social (Sólo cuando se contrate un servicio integral)'},
								{id: 3822, nombre: 'Gastos de orden cultural (Sólo cuando se contrate un servicio integral)'},
								{id: 3831, nombre: 'Congresos y convenciones (Sólo cuando se contrate un servicio integral)'},
								{id: 3841, nombre: 'Exposiciones (Sólo cuando se contrate un servicio integral)'},
								{id: 3851, nombre: 'Gastos de representación'}
							]
					},
					{
						id: 3900,
						nombre: 'Otros Servicios Generales',
						partidas: 
						[
							{ id: 3911, nombre: 'Servicios funerarios y de cementerios'},
							{ id: 3921, nombre: 'Otros impuestos y derechos'},
							{ id: 3931, nombre: 'Impuestos y derechos de importación'},
							{ id: 3941, nombre: 'Laudos laborales'},
							{ id: 3943, nombre: 'Responsabilidad Patrimonial'},
							{ id: 3944, nombre: 'Otras erogaciones por resoluciones por autoridad competente'},
							{ id: 3951, nombre: 'Penas, multas, accesorios y actualizaciones'},
							{ id: 3981, nombre: 'Impuesto sobre nóminas y otros que deriven de una relación laboral'},
							{ id: 3992, nombre: 'Subcontratación de servicios con terceros'},
							{ id: 3993, nombre: 'Gastos menores'},
							{ id: 3994, nombre: 'Programa de Tarifa Especial'},
							{ id: 3995, nombre: 'Otros servicios generales'},
							{ id: 3996, nombre: 'Otros servicios integrales'}
						]
					},
					{
						id: 5100,
						nombre: 'Mobiliario y Equipo de Administracion',
						partidas: 
						[
							{id: 5111, nombre: 'Muebles de oficina y estantería'},
							{id: 5121, nombre: 'Muebles, excepto de oficina y estantería'},
							{id: 5131, nombre: 'Bienes artísticos y culturales'},
							{id: 5151, nombre: 'Equipo de cómputo y de tecnología de la información'},
							{id: 5191, nombre: 'Otros mobiliarios y equipos de administración'}
						]
					},
					{
						id: 5200,
						nombre: 'Mobiliario y Equipo Educacional y Recreativo',
						partidas: 
							[
								{ id: 5211, nombre: 'Equipos y aparatos audiovisuales'},
								{ id: 5221, nombre: 'Aparatos deportivos'},
								{ id: 5231, nombre: 'Cámaras fotográficas y de video'},
								{ id: 5291, nombre: 'Otro mobiliario y equipo educacional y recreativo'}
							]
					},
					{
						id: 5300,
						nombre: 'Equipo e Instrumental Medico y de Laboratorio',
						partidas: 
							[
								{ id: 5311, nombre: 'Equipo médico y de laboratorio'},
								{ id: 5321, nombre: 'Instrumental médico y de laboratorio'}
							]
					},
					{
						id: 5400,
						nombre: 'Vehiculos y Equipos de Transporte',
						partidas: 
							[
								{id: 5411, nombre: 'Vehículos y equipo terrestres, destinados a servicios públicos y la operación de programas públicos'},

								{id: 5412, nombre: 'Vehículos y equipo terrestres, destinados a servicios administrativos'},

								{id: 5414, nombre: 'Vehículos y equipo terrestres, destinados a servidores públicos'},

								{id: 5421, nombre: 'Carrocerías, remolques y equipo auxiliar de transporte'},

								{id: 5491, nombre: 'Otros equipos de transporte'}
							]
					},
					{
						id: 5500,
						nombre: 'Equipo de Defensa y Seguridad',
						partidas: 
							[
								{id: 5511, nombre: 'Equipo de defensa y seguridad'}
							]
					},
					{
						id: 5600,
						nombre: 'Maquinaria, Otros Equipos y Herramientas',
						partidas: 
							[
								{id: 5611, nombre: 'Maquinaria y equipo agropecuario'},
								{id: 5631, nombre: 'Maquinaria y equipo de construcción'},
								{id: 5641, nombre: 'Sistemas de aire acondicionado, calefacción y de refrigeración'},
								{id: 5651, nombre: 'Equipos de comunicación y telecomunicación'},
								{id: 5661, nombre: 'Equipo de generación eléctrica, aparatos y accesorios eléctricos'},
								{id: 5671, nombre: 'Herramientas y máquinas herramienta'},
								{id: 5672, nombre: 'Refacciones y accesorios mayores'},
								{id: 5691, nombre: 'Equipo para semaforización'},
								{id: 5692, nombre: 'Equipo de ingeniería y diseño'},
								{id: 5693, nombre: 'Bienes muebles por arrendamiento financiero'},
								{id: 5694, nombre: 'Maquinaria y equipo diverso'},
							]
					},
					{
						id: 5700,
						nombre: 'Activos Biologicos',
						partidas: 
						[
							{id: 5751, nombre: 'Peces y Acuicultura'},				
							{id: 5781, nombre: 'Arboles y Plantas'},
							{id: 5791, nombre: 'Otros Activos Biologicos'}
						]
					},
					{
						id: 5800,
						nombre: 'Bienes Inmuebles',
						partidas: 
							[
								{id: 5811, nombre: 'Terrenos'}					
							]
					},
					{
						id: 5900,
						nombre: 'Activos Intangibles',
						partidas: 
							[
								{id: 5911, nombre: 'Software'},
								{id: 5941, nombre: 'Derechos'},
								{id: 5971, nombre: 'Licencias Informaticas e Intelectuales'}
							]
					}
				],
				partidas: []
			}
		},


		methods: {

			obtener_cogs(){
				axios.get('tpg/tpgs').then(response => {
					this.pagination = response.data.pagination;
					this.cogs = response.data.data.data;
				});
			},

			buscar_cog(cog){

			},

			changePage(page){
				this.pagination.current_page = page;
				this.obtener_cogs(page);
			},

			check_concepto(concepto) {
				this.partidas = concepto.partidas;
			}
		}

	}
</script>