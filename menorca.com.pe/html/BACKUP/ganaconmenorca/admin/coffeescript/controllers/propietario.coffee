app.controller 'propietarioCrtl',['$scope','$location','$cookieStore','$http','propietarioModal', (scope,location,cookieStore,http,propietarioModal) ->
	## Aqui verificamos la autorizacion del menu
	if http.defaults.headers.common['Authorization']?
		scope.$parent.$parent.boolmenu = true
	else
		location.path('/login')
	## comenzamos a realizar las funciones
	scope.propietario = []
	scope.propietario = {}
	scope.listado = ()->
		url 	= './controllers/propietario/listar.php'
		result 	= http.post(url)
		result.success (response) ->
			scope.propietario = response
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.viewDetail = (id)->
		## le  paso el id
		cookieStore.put('codprop',id)
		## alert id
		propietarioModal.activate()
		## fin de la funcion
		return
	scope.clearData = ()->
		cookieStore.remove('codprop')
		## fin de la funcion
		return
	scope.propietariosExcel = ()->
		window.open('./excel/listpropietarios.php','_blank')
		## fin de la funcion
		return
	scope.referidosExcel = ()->
		window.open('./excel/listrefridos.php','_blank')
		## fin de la funcion
		return
	scope.excelMyReferido = (id) ->
		window.open('./excel/listrefridos.php?id='+id,'_blank')
		return
	scope.clearData()
	scope.listado()
	## fin del controlador
	return
]

app.controller 'propietariomodalCrtl',['$scope','$location','$cookieStore','$http','propietarioModal', (scope,location,cookieStore,http,propietarioModal) ->
	scope.currentTab 	= "./public/views/propietario/detalle.html"
	scope.codprod 		= cookieStore.get('codprop')
	scope.propietario = []
	scope.propietario = {}
	scope.referido = []
	scope.referido = {}
	## alert scope.codprod
	scope.closeModal = ()->
		scope.clearData()
		propietarioModal.deactivate()
		## fin de la funcion	
		return
	scope.detalle = ()->
		url 	= './controllers/propietario/detalle.php'
		result 	= http.post(url,{cod : scope.codprod })
		result.success (response) ->
			scope.propietario = response
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.listreferido = ()->
		url 	= './controllers/propietario/referido.php'
		## alert scope.codprod
		result 	= http.post(url,{cod : scope.codprod })
		result.success (response) ->
			scope.referido = response
			console.log response
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.irSeccion = (seccion,e)->
		idoption = $(e.currentTarget).data("id")
		console.log $("#option_"+idoption).hasClass("active")
		if $("#option_"+idoption).hasClass("active") == false
			## antes de salir borramos
			$(".menuContacto li").removeClass("active")
			$("#option_"+idoption).addClass("active")
		if ('referido' == seccion)
			scope.listreferido()
		
		scope.currentTab 	= "./public/views/propietario/"+seccion+".html"
		return
	scope.clearData = ()->
		cookieStore.remove('codprop')
		## fin de la funcion
		return
	scope.detalle()
	## fin del controlador
	return
]