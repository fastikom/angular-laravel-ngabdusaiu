<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <div ng-if="messages" >
                            <div ng-repeat="message in messages" class="alert alert-warning">{{message[0]}}</div>                    
                    </div>
                    <form class="form-horizontal" ng-submit="registerUser()">


                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input ng-model="newuser.name" type="text" class="form-control" name="name" value="">

                                
                                    <span class="help-block">
                                        <strong>{{ errors[0].name }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input ng-model="newuser.email" type="email" class="form-control" name="email" value="">

                                
                                    <span class="help-block">
                                        <strong>{{ errors[0].email  }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input ng-model="newuser.password" type="password" class="form-control" name="password">

                  
                                    <span class="help-block">
                                        <strong>{{ errors[0].password }}</strong>
                                    </span>
                          
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input ng-model="newuser.password_confirmation" type="password" class="form-control" name="password_confirmation">

                              
                                    <span class="help-block">
                                        <strong>{{ errors[0].password_confirmation }}</strong>
                                    </span>
                             
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
