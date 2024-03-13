app.controller 'menuCrtl',['$scope','$location','$rootScope','userModal', (scope,location,rootScope,userModal) ->
	## console.log rootScope
	scope.userName = rootScope.globals.currentUser.nameuser 
	scope.closeIntranet = ()->
		scope.$parent.$parent.boolmenu = false
		location.path('/login')
		## fin de la función
		return
	scope.viewMenu = (e)->
		## console.log e.currentTarget
		$('.buttonInfo .main-info').toggle()
		#fin de la funcion
		return
	scope.viewMyuser = ()->
		## le  paso el id
		## alert id
		userModal.activate()
		## fin de la funcion
		return
	## fin del controlador
	return
]

app.controller 'usermodalCrtl',['$scope','$location','$rootScope','$http','userModal', (scope,location,rootScope,http,userModal) ->
	scope.currentTab 	= "./public/views/user/detalle.html"
	scope.usuario = []
	scope.usuario = {}
	scope.usercod = rootScope.globals.currentUser.usercod 
	scope.closeModal = ()->
		userModal.deactivate()
		## fin de la funcion	
		return
	scope.detalle = ()->
		url 	= './controllers/user/detalle.php'
		result 	= http.post(url,{cod : scope.usercod })
		result.success (response) ->
			console.log response
			scope.usuario = response
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.detalle()
	## fin del controlador
	return

]