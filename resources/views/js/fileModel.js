blogApp.directive('fileModel', ['$parse', function($parse) {
	return {
		restrict: 'A',
		link : function(scope, element, attrs) {
			var model = $parse(attrs.fileModel)
		}
	}
}])