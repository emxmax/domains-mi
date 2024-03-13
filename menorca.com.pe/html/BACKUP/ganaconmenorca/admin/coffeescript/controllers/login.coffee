'use strict'

app.controller 'LoginCrl',['$scope','$timeout','$rootScope','$location','AuthenticationService',(scope,timeout,rootScope,location,AuthenticationService) ->
	scope.datalogin = []
	scope.datalogin = {}
	scope.error 	= "Los campos son obligatorios."
	scope.$parent.$parent.boolmenu = false

	## Validacion de formulario
	scope.validacion = ()->
		$("#form").validate {
			rules : {
				user 		: "required",
				password 	: "required"
			},
			errorLabelContainer : $("#form .form-error")
		}
		## fin de la función
		return
	## calculamos el alto
	scope.setup = ()->
		$height = $(window).height()
		$('body').css 'height', $height+'px'
		## fin de la funcion
		return

	##Reset login status 
	AuthenticationService.ClearCredentials()
	scope.login = ->
		if ($("#form").valid())
			scope.dataLoading = true
			AuthenticationService.Login scope.datalogin.user,scope.datalogin.password, (response) -> 
				if response.success
					## console.log response
					AuthenticationService.SetCredentials scope.datalogin.user,scope.datalogin.password,response.usercod, response.nameuser, response.miperfil, response.codperfil,response.firstname
					location.path('/vista/principal')
				else
					console.log(response.message)
					scope.error = response.message
					$("#form .form-error").fadeIn("slow")
					scope.dataLoading = false
				return
		## fin de la funcion
		return

	## llamamos a las funciones
	timeout scope.setup, 200
	scope.validacion()
	window.addEventListener("resize", scope.setup)
	## fin del controlador
	return
]