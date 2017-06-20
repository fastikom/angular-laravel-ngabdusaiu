blogApp.controller('LoginCtrl', ['$rootScope', '$scope', '$location', '$http', 'CSRF_TOKEN', 'CSRF_FIELD', 'AuthService', function($rootScope, $scope, $location, $http,  CSRF_TOKEN, CSRF_FIELD, AuthService){
	window.scope =$scope;
	$scope.credentials = {email: "", password : ""}
	
	// очишаем сообщения
	$scope.messages = {};
	// принимаем сообщения из РутСкопа
	$scope.messages.flash = $rootScope.messages;
	$scope.CSRF_TOKEN = CSRF_TOKEN;
	
	$scope.CSRF_FIELD = CSRF_FIELD;
	// $scope.submit = function() {
	// 	$http.post('./login', {'aa' : $scope.email})
	// };
	$scope.login = function() {
		AuthService.login($scope.credentials)
			.success(function(response) {
				$scope.user = response;
				$rootScope.user = response;
				if ($scope.user.roles[0].name = 'admin') {
					return $location.path('/admin')
				}
				return $location.path('/')
			})
			.error(function(response) {
				$scope.messages = response;
			})

	}


}])