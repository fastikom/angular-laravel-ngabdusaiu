<h3>create user</h3>

    <div ng-if="errors" class="alert alert-warning" ng-repeat="error in errors">
	    <span ng-repeat="errorname in error">{{errorname}}</span>
    </div>                    

<form ng-submit="createUser()">
	<label for="name">Name:</label>
	<input name="name" class="form-control" type="text" ng-model="user.name">
	<label for="email">Email:</label>
	<input name="email" class="form-control" type="text" ng-model="user.email">
	<label for="password">Password:</label>
	<input name="password" class="form-control" type="text" ng-model="user.password">

	
	<select name="role" id="" ng-init="user.role = roles[0]" 
        ng-model="user.role" 
        ng-options="role.name for role in roles">

    </select>


	<button type="submit" class="btn btn-primary">Create</button>
</form>