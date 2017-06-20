blogApp.controller('DetailsCtrl', ['$scope', '$http', '$stateParams', '$routeParams', 'AuthService', function($scope, $http, $stateParams, $routeParams, AuthService){
	window.scope =$scope;
	$http.get('api/posts/' + $stateParams.id).success(function(data) {
		$scope.post = data;
		$scope.imgUrl = 'http://lorempixel.com/640/480/' ;
		$scope.images = [];
		for (var i = 1; i < 4; i++) {
			$scope.images.push('http://lorempixel.com/640/48' + i);
		}

	})
	AuthService.isAuth().success(function(data) {
		// set variable Auth true or false
		$scope.Auth = (data);
	})
	
	$scope.editTitle = function() {
		$scope.editable = true;
	}

	$scope.setImage = function(imageUrl) {
	 	$scope.imgUrl = imageUrl;
	}

	 $scope.updatePost = function() {
	 	$http.post('posts/'  + $stateParams.id, $scope.post).success(function(data) {
	 		console.log(data);
	 		$scope.errors = data.errors
	 	})
	 }
}])