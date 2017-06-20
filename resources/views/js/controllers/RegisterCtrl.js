blogApp.controller('RegisterCtrl', ['$scope', '$http', function($scope, $http) {
	$scope.registerUser = function() {
		$http.post('./register', $scope.newuser).success(function(data) {
			if (data.confirmed == true) {
				$location.path('/login')
			}
			$scope.messages = data.messages;
			console.log(data);
		})
	}
}])


blogApp.controller('VerifyCtrl', ['$scope', '$rootScope', '$location', '$http' , '$stateParams', function($scope, $rootScope, $location,$http, $stateParams){
	window.verifyscope = $scope;
	console.log($stateParams.code);
	$http.get('./register/verify/'+$stateParams.code).success(function(data) {
		$scope.data = data;
		console.log(data.verifieduser);
		$rootScope.messages = data.message;
		$location.path('/login');
	})

}])
