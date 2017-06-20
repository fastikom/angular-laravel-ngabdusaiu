blogApp.controller('AdminCtrl', ['$scope', '$http', '$location', 'UserService', 'RE_CAP_SITE', function($scope, $http, $location, UserService, RE_CAP_SITE){

	window.scope = $scope
	$scope.capcha = RE_CAP_SITE


	 $scope.addPost = function() {
	 	return $http.post('./posts', $scope.post).success(function(data) {
	 		$scope.errors = {}
	 		$scope.messages = {}
	 		console.log(data)
	 		
	 		if (data.capcha = true) {
	 			$scope.post = {};
	 			$scope.messages = data.messages;
	 		}
	 		// $location.path('/')
			
	 		grecaptcha.reset();
	 		$scope.errors = data.errors;
	 	})
	 }

	 $scope.createUser = function() {
	 	return $http.post('./users', $scope.user).success(function(data) {
	 		$scope.errors = '';
	 		console.log('user created:')
	 		console.log(data)
	 		$scope.errors = data.errors;
	 	})
	 }

	 UserService.users().success(function(data) {
	 	$scope.users = (data);
	 })

	 UserService.roles().success(function(data) {
	 	// console.log(data);
	 	$scope.roles = data;
	 })

	 
}])	