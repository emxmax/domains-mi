// Generated by CoffeeScript 1.10.0
'use strict';
var app;

app = angular.module("antEspejo", ['ngSanitize', 'ngRoute', 'ngCookies', 'ngCkeditor']);

app.config([
  '$routeProvider', function(routeProvier) {
    var routeP;
    routeP = routeProvier;
    routeP.when('/', {
      templateUrl: 'resources/assets/vista/login/login.html',
      controller: 'LoginCrl'
    });
    routeP.when('/login', {
      templateUrl: 'resources/assets/vista/login/login.html',
      controller: 'LoginCrl'
    });
    routeP.when('/vista/principal/', {
      templateUrl: 'resources/assets/vista/bienvenida/bienvenida.html',
      controller: ''
    });
    routeP.when('/usuario', {
      templateUrl: 'resources/assets/vista/usuario/usuario.html',
      controller: ''
    });
    routeP.when('/usuario/formulario/', {
      templateUrl: 'resources/assets/vista/usuario/formulario.html',
      controller: ''
    });
    routeP.when('/noticia', {
      templateUrl: 'resources/assets/vista/noticia/noticia.html',
      controller: ''
    });
    routeP.when('/noticia/formulario/', {
      templateUrl: 'resources/assets/vista/noticia/formulario.html',
      controller: ''
    });
    routeP.when('/bibliografia', {
      templateUrl: 'resources/assets/vista/bibliografia/bibliografia.html',
      controller: ''
    });
    routeP.when('/galeria', {
      templateUrl: 'resources/assets/vista/galeria/galeria.html',
      controller: ''
    });
    routeP.when('/galeria/formulario/', {
      templateUrl: 'resources/assets/vista/galeria/detalle/formulario.html',
      controller: ''
    });
    routeP.otherwise({
      redirecTo: '/login'
    });
  }
]);

app.run([
  '$rootScope', '$location', '$cookieStore', '$http', function(rootScope, location, cookieStore, http) {
    rootScope.globals = cookieStore.get('globals') || {};
    if (rootScope.globals.currentUser) {
      http.defaults.headers.common['Authorization'] = 'Basic ' + rootScope.globals.currentUser.authdata;
    }
    rootScope.$on('$locationChangeStart', function(event, next, current) {
      if (location.path() !== '/login' && !rootScope.globals.currentUser) {
        location.path('/login');
      }
    });
  }
]);
