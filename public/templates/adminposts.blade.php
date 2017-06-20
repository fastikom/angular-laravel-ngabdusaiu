<h3>Add article</h3>
			<!-- errors -->
			<div ng-if="errors" ng-repeat="error in errors" class="alert alert-danger">
				<!-- close (X) -->
				<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> {{error[0]}}
			</div>
			<div ng-if="messages" ng-repeat="message in messages" class="alert alert-success">
				<!-- close (X) -->
				<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> {{message[0]}}
			</div>
			<form ng-submit="addPost()">
				<input class="form-control" type="hidden" name="_token" value="{{CSRF_TOKEN}}">
				<label for="picture">Picture:</label>
				<input class="form-control" type="file" name="picture" id="pict" file-model="post.picture">
				<label for="title">Title:</label>
				<input class="form-control" type="text" class="form-control" name="title" ng-model="post.title">
				<label for="text">Text:</label>
				<textarea class="form-control" name="text" class="form-control" id="" cols="30" rows="10"  ng-model="post.text"></textarea>
				<br>

				<input class="btn btn-default" type="submit" value="Add">
				<div style="float: right" ng-model="post.capcha" vc-recaptcha key="'6LdebhsTAAAAAHqpF1NDZUYZXeOACvN_H2T3pReH'"></div>

			</form>	