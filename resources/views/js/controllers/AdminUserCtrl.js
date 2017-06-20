blogApp.controller('AdminUserCtrl', ['$scope', '$http', '$location', '$stateParams', 'UserService', function($scope, $http, $location, $stateParams, UserService){

	window.scope = $scope
	// console.log($stateParams.id)
	UserService.user($stateParams.id).success(function(data) {
		console.log(data)
		$scope.user = data
	})
	 
}])	