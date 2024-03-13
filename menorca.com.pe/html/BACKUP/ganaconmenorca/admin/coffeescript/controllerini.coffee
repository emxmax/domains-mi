'use strict'

app = angular.module "MenorcaLotes",[
	'ngRoute'
	'ngCookies'
	'angularUtils.directives.dirPagination',
	'ngSanitize',
	'com.2fdevs.videogular',
	'com.2fdevs.videogular.plugins.controls',
	'com.2fdevs.videogular.plugins.overlayplay',
	'com.2fdevs.videogular.plugins.poster',
	'btford.modal'
]

app.config ['$routeProvider', (routeProvier) ->
	routeP = routeProvier
	routeP.when '/', {
		templateUrl : 'public/views/login/login.html'
		controller : 'LoginCrl'
	}
	routeP.when '/login', {
		templateUrl : 'public/views/login/login.html',
		controller : 'LoginCrl'
	}
	routeP.when '/vista/principal', {
		templateUrl : 'public/views/propietario/lista.html',
		controller : ''
	}
	routeP.otherwise redirecTo : '/login'

	return
]

app.run ['$rootScope','$location', '$cookieStore','$http', (rootScope,location,cookieStore,http) ->
	rootScope.globals = cookieStore.get('globals') || {}

	http.defaults.headers.common['Authorization'] = 'Basic ' + rootScope.globals.currentUser.authdata if rootScope.globals.currentUser

	rootScope.$on '$locationChangeStart', (event, next, current) ->
		## console.log rootScope.globals
		location.path('/login') if location.path()!= '/login' && !rootScope.globals.currentUser
		return
	return
]

app.controller 'MainControlCrtl',['$scope','$http','$location', (scope,http,location) ->
	scope.boolmenu = false
	if http.defaults.headers.common['Authorization']?
		scope.boolmenu = true
	else
		location.path('/login')
	## fin del controlador
	return
]