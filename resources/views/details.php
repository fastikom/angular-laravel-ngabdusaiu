@extends('app')
@section('content')
<!-- PORTFOLIO -->

{{dd('ss')}}
    
		<div class="container object">

			<div id="main-container-image">
            	
                <div class="title-item">
                	<div class="title-icon"></div>
                    <div class="title-text">{{$post->title}} </div>
                    <div class="title-text-2">{{$post->created_at}} by {{$post->author}}</div>
                </div>
                
     			       
				<div class="work">
					<figure class="white">
							 <img src="img/psd-4.jpg" alt="" />
                         <div id="wrapper-part-info">
                             <div class="part-info-image">
                                <img src="img/mockup-1.jpg" alt="" width="628" height="437"/>
                                <img src="img/mockup-2.jpg" alt="" width="628" height="437"/>
                                <img src="img/mockup-3.jpg" alt="" width="628" height="437"/>
                             </div>
						 </div>
                    </figure>	
				
                <div class="wrapper-text-description">
                
                	<div class="wrapper-view">
                    	<div class="icon-view"><img src="img/icon-eye.svg" alt="" width="24" height="16"/></div>
                        <div class="text-view">2,451 views</div>
                    </div>
                
                	<div class="wrapper-file">
                    	<div class="icon-file"><img src="img/icon-psdfile.svg" alt="" width="21" height="21"/></div>
                        <div class="text-file">Photoshop</div>
                    </div>
                    
                    <div class="wrapper-weight">
                    	<div class="icon-weight"><img src="img/icon-weight.svg" alt="" width="20" height="23"/></div>
                        <div class="text-weight">23 Mo</div>
                    </div>
                    
                    <div class="wrapper-desc">
                    	<div class="icon-desc"><img src="img/icon-desc.svg" alt="" width="24" height="24"/></div>
                        <div class="text-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </div>
                    </div>
                    
                    <div class="wrapper-download">
                    	<div class="icon-download"><img src="img/icon-download.svg" alt="" width="19" height="26"/></div>
                        <div class="text-download"><a href="#"><b>Download</b></a></div>
                    </div>
                    
                    <div class="wrapper-morefrom">
                    	<div class="text-morefrom">More from .psd</div>
                        <div class="image-morefrom">
                        	<a href="#"><div class="image-morefrom-1"><img src="img/psd-1.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-2"><img src="img/psd-2.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-3"><img src="img/psd-3.jpg" alt="" width="430" height="330"/></div></a>
                            <a href="#"><div class="image-morefrom-4"><img src="img/psd-6.jpg" alt="" width="430" height="330"/></div></a>
                        </div>
                    </div>
                    
                </div>
                
                	<div class="post-reply">
                    	<div class="image-reply-post"></div>
                    	<div class="name-reply-post">Igor vlademir</div>
                    	<div class="text-reply-post">Awesome mockup, i like it very much ! It will help me for my website i was looking for since few days. Thank you a lot.</div>
                	</div>
                    
                    <div class="post-reply-2">
                    	<div class="image-reply-post-2"></div>
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
			</div>	
		</div>
}
}
@stop