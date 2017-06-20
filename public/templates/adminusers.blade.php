<div class="jumbotron">
	<h3>Show Users</h3>
	<a class="btn btn-success" ui-sref="admin.createuser">Create</a>
</div>
<table class="table table-striped table-bordered">

	<tr>
		<th>id</th>
		<th>name</th>
		<th>role</th>
		<th>email</th>
		<th>confirmed</th>		
		<th>edit</th>		
		<th>delete</th>		
	</tr>
	<tr ng-repeat="user in users">
		<td>{{user.id}}</td>
		<td><a ui-sref="admin.user({id : user.id})">{{user.name}}</a></td>
		<td>{{user.roles[0].name}}</td>
		<td>{{user.email}}</td>
		<td>{{user.confirmed}}</td>
		<td><a href=""><button class="btn btn-primary">Edit</button></a></td>
		<td><a href=""><button class="btn btn-danger">Delete</button></a></td>
	</tr>
	
</table>

			