

    
    <div class="container object">

			<div id="main-container-image">
            <form ng-submit="updatePost()">
                <div class="title-item">
                	<div class="title-icon">
                        <img src="img/icon-{{post.category.title}}.svg" alt="" width="100%">   
                    </div>
                    <div ng-if="Auth" >
                            <div class="title-text" ng-hide="editable" ng-dblclick="editTitle()">{{post.title}}</div>
                            <input class="title-text" type="text" ng-blur="editable = false" ng-show="editable" value="{{post.title}}" ng-model="post.title">
                    </div>
                    <div ng-if="Auth == false" >
                            <div class="title-text">{{post.title}}</div>
                    </div>
                    
                    
                    <div class="title-text-2">{{post.created_at}} by <b>{{post.author}}</b></div>
                </div>
                
     			       
				<div class="details">
					<figure class="white">
							 <img ng-src={{imgUrl}} alt="" />
                         <div id="wrapper-part-info">
                             <div class="part-info-image">
                                <img ng-repeat="img in images" ng-src="{{img}}" ng-click="setImage(img)" alt="" width="628" height="437"/>

                             </div>
						 </div>
                    </figure>	
				
                <div class="wrapper-text-description">
                    <div class="wrapper-view">
                        <div class="icon-view"><input type="submit" class="btn btn-primary" value="Update"></div>
                    </div>
                    <br>

                	<div class="wrapper-view">
                    	<div class="icon-view"><img src="./img/icon-eye.svg" alt="" width="24" height="16"/></div>
                        <div class="text-view">2,451 views</div>
                    </div>
                
                	<div class="wrapper-file">
                    	<div class="icon-file"><img src="./img/icon-psdfile.svg" alt="" width="21" height="21"/></div>
                        <div class="text-file">Photoshop</div>
                    </div>
                    
                    <div class="wrapper-weight">
                    	<div class="icon-weight"><img src="./img/icon-weight.svg" alt="" width="20" height="23"/></div>
                        <div class="text-weight">23 Mo</div>
                    </div>
                    
                    <div class="wrapper-desc">
                    	<div class="icon-desc"><img src="./img/icon-desc.svg" alt="" width="24" height="24"/></div>
                        <div class="text-desc" ng-hide="editable" ng-dblclick="editTitle()" >{{post.description}}</div>
                        <textarea class="text-desc" name="description" ng-blur="editable = false" ng-show="editable"  ng-model="post.description" id="" cols="50" rows="30" >{{post.description}}</textarea>
                    </div>
                    
                    <div class="wrapper-download">
                    	<div class="icon-download"><img src="./img/icon-download.svg" alt="" width="19" height="26"/></div>
                        <div class="text-download"><a href="#"><b>Download</b></a></div>
                    </div>
                    
                    <div class="wrapper-morefrom">
                    	<div class="text-morefrom">More from .psd</div>
                        <div class="image-morefrom">
                        	<a href="#"><div class="image-morefrom-1"><img src="./img/psd-1.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-2"><img src="./img/psd-2.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-3"><img src="./img/psd-3.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-4"><img src="./img/psd-6.jpg" alt="" width="430" height="330"/></div></a>
                        </div>
                    </div>
                    
                </div>
                
                	<div class="post-reply">
                    	<div class="image-reply-post">
                            <img src="http://loremflickr.com/150/150/avatar" alt="">
                        </div>
                    	<div class="name-reply-post">Igor vlademir</div>
                    	<div class="text-reply-post">Awesome mockup, i like it very much ! It will help me for my website i was looking for since few days. Thank you a lot.</div>
                	</div>
                    
                    <div class="post-reply-2">
                    	<div class="image-reply-post">
                            <img src="http://loremflickr.com/150/150/avatar,2" alt="">  
                        </div>
                    	<div class="name-reply-post-2">Nathan Shaw</div>
                    	<div class="text-reply-post-2">Well done ! I like the way you did it. Awesome ! </div>
                	</div>
                    
                	<div class="post-send">
                    	<div id="main-post-send"> 
                            <div id="title-post-send">Add your comment</div>
							<form id="contact" method="post" action="/onclickprod/formsubmit_op.asp">
    							<fieldset>
									<p><textarea id="message" name="message" maxlength="500" placeholder="Votre Message" tabindex="5" cols="30" rows="4"></textarea></p>
								</fieldset>
								<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" /></div>
  							</form>
                        </div>
					</div>
                </div>
            </form> 
			</div>	
		</div>
