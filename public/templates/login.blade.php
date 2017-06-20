
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div ng-if="messages.flash" >
                            <div class="alert alert-warning">{{messages.flash}}</div>                    
                    </div>
                    <div ng-if="messages.danger" >         
                            <div class="alert alert-danger">{{messages.danger}}</div>           
                    </div>
                    
                    <!-- <form class="form-horizontal" role="form" method="POST" action="./login"> -->
                    <form class="form-horizontal" ng-submit="login()">
                        
                        
                    <span  ng-switch="user.email">
                        <span class="alert alert-danger" ng-switch-when="areyoudead@inbox.ru">admin {{user.email}}</span>
                        <span ng-switch-when="">admin {{user.admin}}</span>
                    </span>
                        <div class="form-group">
                        <input type="hidden" name="_token" value="{{CSRF_TOKEN}}">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input shows-message-when-hovered message="enter email" type="email" class="form-control" name="email" ng-model="credentials.email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input shows-message-when-hovered message="enter password" type="password" class="form-control" name="password" ng-model="credentials.password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" ng-model="credentials.remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                                <a class="btn btn-primary" ui-sref="register">Register</a>
                                <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>

                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn btn-block btn-social btn-facebook" type="submit"><span class="fa fa-facebook"></span>Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-twitter" type="submit"><span class="fa fa-twitter"></span>Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    blogApp.controller('AdminCtrl', ['$scope', '$http', '$location', 'CSRF_TOKEN', 'CSRF_FIELD', function($scope, $http, $location, CSRF_TOKEN, CSRF_FIELD){

    $http.get('admin')
        .success(function(data){
            if (data.flash) {
                console.log(data);  
                $location.path('login')
            }
            if (data.email = 'areyoudead@inbox.ru') {
                console.log('admin');   
            }
            
        })
        .error(function(data, err) {
            console.log(err);
        })
    
    $scope.CSRF_TOKEN = CSRF_TOKEN;

    $scope.CSRF_FIELD = CSRF_FIELD;

}])
</script>