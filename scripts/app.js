angular.module('bmsApp',[
	'ui.router'
	])
.config(['$stateProvider','$urlRouterProvider', function($stateProvider, $urlRouterProvider){

	$stateProvider
		.state('main',{
			url:'/main',
			template:'<h2>Hola al principal </h2><p>Este es un parrafo sencillo</p>'
		})
		.state('usuarios',{
			url:'/users',
			template:'<h2>Modificacion de usuarios</h2><div><ul><li>Jose</li><li>Pedro</li></ul></div>'
		});
}]);