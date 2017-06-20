blogApp.controller('MainCtrl', ['$rootScope', '$scope', '$http', '$location', 'UserService', 'AuthService', function($rootScope, $scope, $http, $location, UserService, AuthService){
	window.scope = $scope;
	$http.get('api/posts').success(function(data) {
		$scope.posts = data.posts;
		UserService.currentuser()
			.success(function(data) {
				$rootScope.user = data 
				$scope.user = $rootScope.user
			})
			.error(function(err, errnum) {
				if (errnum = 401) {
					// $scope.user = {'name' : 'zt'};
				}
			})
		// Указание что вся дата загружена и можно пускать Директиву
		$scope.loadingIsDone = true;
	})
	$scope.isActive = function(destination) {
		return destination === $location.path();
	}
	$scope.logout = function() {
		AuthService.logout().success(function(response) {
			console.log('response')
			console.log(response)
			$rootScope.messages = response;
			$location.path('/login');
		});
	}
		// Проверяем авторизирован ли пользователь
		AuthService.isAuth().success(function(data) {
			// в переменную пишем тру или фалс
			$scope.Auth = (data);
		})
		UserService.currentuser().success(function(data) {
			if (data.roles[0].id = 2) $scope.isAdmin = true;
			// console.log(data)
		}) 
	$scope.items = [
		{name : 'Table', price : 44.90},
		{name : 'Chair', price : 45.90},
		{name : 'Stif', price : 4.90},
		{name : 'Sofa', price : 31.90},
		{name : 'Wardrobe', price : 244.90},
	]
}])
blogApp.directive('orderedList', function() {
	return function(scope, element, attrs) {
		
			// if (scope.loadingIsDone) {

			// scope.$watch('posts', function() {
				var orderedListAttrValue = attrs['orderedList'];
				var list = attrs['list'];
				var data = scope[orderedListAttrValue];
				var e = angular.element('<'+list+'>');

				element.append(e);
				for (i=0; i < data.length; i++) {
					e.append(angular.element('<div>').text(data[i].title))
					console.log(i)
				}
			// }, true)
			// }
	}
})

blogApp.factory('AuthService', ['$http', '$location', function($http, $location){
	return {
		login : function (credentials) {
			return $http.post('./login', credentials)
		},
		logout : function() {

			return $http.get('./logout')
		},
		isAuth : function() {
			return $http.get('./api/auth')
		},		
	}
}]);



blogApp.directive('showsErrorMessage', function() {
	return {
		restrict : "A",
		link : function(scope, element, attributes) {
			
				scope.messages = scope.errormessage + '!!!!';
				// scope.$apply();
			
		}
	}
})
blogApp.directive('showsMessageWhenHovered', function() {
	
	return {
		restrict : "A",
		link : function(scope, element, attributes) {
			// var origMessage = scope.message;
			
			// element.bind("mouseover", function() {
			// 	scope.message = attributes.message;
			// 	scope.$apply();
			// });


		}
	}
})


