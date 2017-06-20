var blogApp = angular.module('blogApp', ['ngRoute', 'ui.router', 'vcRecaptcha']);
blogApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/');

	$stateProvider
		.state('index', {
			url : '/',
			templateUrl: './templates/landing.blade.php',
			controller : 'MainCtrl'
		})
		.state('login', {
			url : '/login',
			templateUrl: './templates/login.blade.php',
			controller : 'LoginCtrl',
			resolve : {
				'check' : function($http, $location, UserService, AuthService) {
								// Проверяем авторизирован ли пользователь
					AuthService.isAuth().success(function(data) {
						
						if (data===true) {
							$location.path('/')
						}

					}).error(function() {
						// console.log('Auth')
					})
				}
			}
		})
		.state('register', {
			url : '/register',
			templateUrl : './templates/register.blade.php',
			controller : 'RegisterCtrl'
		})
		.state('verify', {
			url : '/verify/:code',
			controller : 'VerifyCtrl'
		})
		.state('admin', {
			url : '/admin',
			abstract : true, // это щначит что путя АДМИН просто - нет. Абстракт
			// views : {'' : {templateUrl: './templates/adminposts.blade.php'}},
			templateUrl : './templates/admin.blade.php',
			controller : ('AdminCtrl'),
			resolve : {
				"check" : function($http, $location) {
					$http.get('./admin').success(function(data) {
						if (data.roles[0].name !== 'admin') {
							 $location.path('/login');
						}
					}).error(function() {
						 $location.path('/login');

					})
				}
			},
			onEnter : function($http, $location) {
					$http.get('./admin').success(function(data) {
						if (data.roles[0].name !== 'admin') {
							 $location.path('/login');
						}
					}).error(function() {
						 $location.path('/login');

					})
			}
		})
		// nested list with custom controller
		    .state('admin.posts', {
		        url: '', // указываем пустой роут для того чтобы по умолчанию открывался это вью
		        templateUrl: './templates/adminposts.blade.php',
		        controller : ('AdminCtrl')
		    })

		    // nested list with just some random string data
		    .state('admin.users', {
		        url: '/users',
		        templateUrl: './templates/adminusers.blade.php',
		        controller : ('AdminCtrl')
		    })
		    .state('admin.user', {
		    	url: '/user/:id',
		    	templateUrl : './templates/adminuser.blade.php' ,
		    	controller : 'AdminUserCtrl'

		    })
		    .state('admin.createuser', {
		    	url: '/createuser',
		     	templateUrl : './templates/createuser.blade.php',
		     	controller : ('AdminCtrl')
		    })
		.state('details', {
			url : '/details/:id',
			templateUrl : './templates/details.blade.php',
			controller : ('DetailsCtrl')
		})
}])