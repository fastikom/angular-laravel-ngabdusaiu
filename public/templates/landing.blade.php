
		<button ng-if="Auth" class="btn btn-danger" ng-click="logout()">Log Out</button>
		<div class="container object">

			<div id="main-container-image">
					<!-- <span ng-switch="user.email">
					    <span ng-switch-when="areyoudead@inbox.ru">admin {{user.email}}</span>
					    <span ng-switch-when="">admin {{user.admin}}</span>
					</span> -->
					<!-- <h1>{{user.name}}</h1>                        -->
					<section class="work">

						<figure class="white" ng-repeat="post in posts | filter:searchPost | filter: myFilter">
							<p>{{post.tags[0].name}}</p>
							<p>{{post.tags[2].name}}</p>
							<a ui-sref="details({id: post.id})">

								<img src="http://loremflickr.com/320/240/{{post.category.title}}" alt="{{post.category.title}}" /> 
								
								<dl>
									<dt>{{post.title}}</dt>
									<dd>{{post.description}}</dd>	
								</dl>
							</a>
                            <div id="wrapper-part-info">
                            	<div class="part-info-image part-info-image-icon"><img src="img/icon-{{post.category.title}}.svg" alt="" width="28" height="28"/></div>
                            	<div id="part-info">{{post.category.title}}</div>
							</div>
						</figure>
				
						
                        
					</section>
                    
			</div>	

			<div ng-if="loadingIsDone">
            	    <div ordered-list="posts" list="div"></div>
            </div>