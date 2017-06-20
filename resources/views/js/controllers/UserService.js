blogApp.factory('UserService', ['$http', '$location', function($http, $location){
	return {
		currentuser : function() {
			return $http.get('./api/currentuser')
		},
		users : function() {
			return $http.get('./api/users');
		},
		roles : function() {
			return $http.get('./api/roles');
		},
		user : function(id) {
			console.log(id)
			return $http.get('./api/users/'+id)
		}

	}

	
}])