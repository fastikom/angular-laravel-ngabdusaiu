<!DOCTYPE HTML>
<html ng-app="blogApp">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Burstfly - Free HTML5 Template</title>

    <!-- Behavioral Meta Data -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="img/small-logo-01.png">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,400italic,500,300italic,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-    ng-cloak {
        display: none !important;
    }
    .active {
      color: #000;
    }
    </style>
</head>

<body class="ng-cloak" ng-cloak ng-controller="MainCtrl">

    <a name="ancre"></a>

    <!-- CACHE -->
    <div class="cache"></div>

    <!-- HEADER -->
    @if (count($errors))
    <ul>
        @foreach($errors->all() as $error)
        // Remove the spaces between the brackets
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div id="wrapper-header">
       <div id="main-header" class="object">
          <div class="logo"><a href="#/"><img src="https://www.mydobot.com/assets/dobot_logo_text_white-bc60280c82a8f897c8cd16b15d214a9a45398aad51454065cfb10adb58eef91d.png" alt="logo burstfly" height="40"></a></div>
          <div id="main_tip_search"> 
             
            <form>
                <input type="text" ng-model="searchPost" name="search" id="tip_search_input" list="search" autocomplete=off required placeholder="">
            </form>
            
        </div>
        <div id="stripes"></div>
    </div>
</div>

<!-- NAVBAR -->
<div id="wrapper-navbar">
  <div class="navbar object">
      <div id="wrapper-sorting">
        <div id="wrapper-title-1">
            <a href="#/"><div ng-class="{active : isActive('/')}" class="oldies object">Home</div></a>
            <div id="fleche-nav-1"></div>
        </div>
        
        <!-- <div id="wrapper-title-2">
            <a href="#"><div class="recent object">Recent</div></a>
            <div id="fleche-nav-2"></div>
        </div> -->

        <div ng-if="isAdmin" id="wrapper-title-3">
            <a ui-sref="admin.posts"><div ng-class="{active : isActive('/admin')}" class="oldies object">Admin, @{{user.name}}</div></a>
            <div id="fleche-nav-3"></div>
        </div>

        
        <div ng-if="Auth" id="wrapper-title-3">
            <a href="./logout"><div class="oldies object">Logout</div></a>
            <div id="fleche-nav-3"></div>
        </div>    
        
        <div ng-if="!Auth" id="wrapper-title-3">
            <a ui-sref="login"><div ng-class="{active : isActive('/login')}" class="oldies object">Login</div></a>
            <div id="fleche-nav-3"></div>
        </div>
        
        <div id="wrapper-title-3">
            <a href="#" data-toggle="modal" data-target="#modal"><div class="oldies object">Contact Us</div></a>
            <div id="fleche-nav-4"></div>
        </div>
    </div>
    <div id="wrapper-bouton-icon">
       <div id="bouton-ai" ng-click="myFilter = {}"><img src="{{URL::to('/')}}/img/icon-ai.svg" alt="illustrator" title="Illustrator" height="28" width="28"></div>
       <div id="bouton-psd"><img src="{{URL::to('/')}}/img/icon-psd.svg" alt="photoshop" title="Photoshop" height="28" width="28"></div>
       <div id="bouton-theme"><img src="{{URL::to('/')}}/img/icon-themes.svg" alt="theme" title="Theme" height="28" width="28"></div>
       <div id="bouton-font" ng-click="myFilter = {category_id: 1}"><a href="#/"><img src="{{URL::to('/')}}/img/icon-font.svg" alt="font" title="Font" height="28" width="28"></a></div>
       <div id="bouton-photo" ng-click="myFilter = {category_id: 2}"><img src="{{URL::to('/')}}/img/icon-photo.svg" alt="photo" title="Photo" height="28" width="28"></div>
       <div id="bouton-premium" ng-click="myFilter = {category_id: 3}"><img src="{{URL::to('/')}}/img/icon-premium.svg" alt="premium" title="Premium" height="28" width="28"></div>
   </div>
</div>
</div>

<!-- FILTER -->	

<div id="main-container-menu" class="object">
   <div class="container-menu">
       
    <div id="main-cross">
       <div id="cross-menu"></div>
   </div>
   
   <div id="main-small-logo">
       <div class="small-logo"></div>
   </div>
   
   <div id="main-premium-ressource">
    <div class="premium-ressource"><a href="#">Premium resources</a></div>
</div>

<div id="main-themes">
    <div class="themes"><a href="#">Latest themes</a></div>
</div>

<div id="main-psd">
    <div class="psd"><a href="#">PSD goodies</a></div>
</div>

<div id="main-ai">
    <div class="ai"><a href="#">Illustrator freebies</a></div>
</div>

<div id="main-font">
    <div class="font"><a href="#">Free fonts</a></div>
</div>

<div id="main-photo">
    <div class="photo"><a href="#">Free stock photos</a></div>
</div>

</div>
</div>

<div id="wrapper-container">
    <!-- PORTFOLIO -->

    <div ui-view></div>

    
    <div id="wrapper-thank">
    	<div class="thank">
           <div class="thank-text"><img src="https://www.mydobot.com/assets/dobot_logo_text_white-bc60280c82a8f897c8cd16b15d214a9a45398aad51454065cfb10adb58eef91d.png" width="400px" alt=""></div>
       </div>
   </div>
   
   <div id="main-container-footer">
      <div class="container-footer">
       
        <div id="row-1f">
           <div class="text-row-1f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">What is Burstfly</span><br>Burstfly is just a blog showcasing hand-picked free themes, design stuff, free fonts and other resources for web designers.</div>
       </div>
       
       <div id="row-2f">
           <div class="text-row-2f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">How does it work</span><br>Burstfly offers you all the latest freebies found all over the fourth corners without to pay.</div>
       </div>
       
       <div id="row-3f">
           <div class="text-row-3f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">Get in touch!</span><br>Subscribe our RSS or follow us on Facebook, Google+, Pinterest or Dribbble to keep updated.</div>
       </div>
       
       <div id="row-4f">
           <div class="text-row-4f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">Newsletter</span><br>You will be informed monthly about the latest content avalaible.</div>

           <div id="main_tip_newsletter"> 
               <form>
                  <input type="text" name="newsletter" id="tip_newsletter_input" list="newsletter" autocomplete=off required>
              </form>
          </div>
      </div>
      
  </div>
</div>


<div id="wrapper-copyright">
  <div class="copyright">
      <div class="copy-text object">Copyright © 2016</div>
      
      <div class="wrapper-navbouton">
         <div class="google object">g</div>
         <div class="facebook object">f</div>
         <div class="linkin object">i</div>
         <div class="dribbble object">d</div>
     </div>
 </div>
</div>

</div>

{{ csrf_field() }}

<!-- SCRIPT -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../resources/views/js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="../resources/views/js/jquery.localScroll.min.js"></script>
<script type="text/javascript" src="../resources/views/js/jquery-animate-css-rotate-scale.js"></script>
<script type="text/javascript" src="../resources/views/js/fastclick.min.js"></script>
<script type="text/javascript" src="../resources/views/js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="../resources/views/js/jquery.animate-shadow-min.js"></script>    

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>

<script type="text/javascript" src="../resources/views/js/controllers/app.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/MainCtrl.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/DetailsCtrl.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/AdminCtrl.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/RegisterCtrl.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/LoginCtrl.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/UserService.js"></script>
<script type="text/javascript" src="../resources/views/js/controllers/AdminUserCtrl.js"></script>

<script>
    
    
    
    
    angular.module("blogApp").constant("CSRF_TOKEN", "{!! csrf_token() !!}");
    angular.module("blogApp").constant("CSRF_FIELD", {"field" : "{!! csrf_token() !!}"});
    angular.module("blogApp").constant("RE_CAP_SITE", "{{ env('RE_CAP_SITE') }}");


</script>
<script type="text/javascript" src="../resources/views/js/angular-route.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- <script src="../node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js"></script>
    <script src="../node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js"></script> -->
<script src="../node_modules/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>    
<script
  src="https://www.google.com/recaptcha/api.js?onload=vcRecaptchaApiLoaded&render=explicit"
  async defer
></script> 
<script type="text/javascript" src="../node_modules/angular-recaptcha/release/angular-recaptcha.js"></script>
    <script>
       

       
        $(document).ready(function() {
          $.localScroll();
          $(".cache").delay(1000).fadeOut(500);
          $("#wrapper-header").delay(1500).animate({opacity:'1',width:'100%'},500);
          $("#wrapper-navbar").delay(2000).animate({opacity:'1',height:'60px'},500);
          $("#main-container-image").delay(2500).animate({opacity:'1'},500);
          
      });

        /*TRANSITION PAGE*/

        var speed = 'slow';

        $('html, body').hide();

        $(document).ready(function() {
            $('html, body').fadeIn(speed, function() {
                $('a[href], button[href]').click(function(event) {
                    var url = $(this).attr('href');
                    if (url.indexOf('#') == 0 || url.indexOf('javascript:') == 0) return;
                    event.preventDefault();
                    $('html, body').fadeOut(speed, function() {
                        window.location = url;
                    });
                });
            });
        });

        /* DISABLE HOVER EFFECT WHILE YOU SCROLL FOR A SMOOTHY NAVIGATION */

        var body = document.body,
        timer;

        window.addEventListener('scroll', function() {

           clearTimeout(timer);

           if(!body.classList.contains('disable-hover'))
              body.classList.add('disable-hover')

          timer = setTimeout(function(){
              body.classList.remove('disable-hover')
          }, 200);

      }, false);
        
        /* BOUTON MENU */

        $(document).on('touchstart mouseover', '#stripes', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#stripes").stop().animate({scale:'1.2',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#stripes', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#stripes").stop().animate({scale:'1',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* MENU SIDE OPEN */

        var MENUSIDEOPEN = document.getElementById('stripes');

        MENUSIDEOPEN.addEventListener('click', function() {
          $("#main-container-menu").stop().animate({left:'0'},300);	
      }); 

        /* BOUTON CROSS */

        $(document).on('touchstart mouseover', '#cross-menu', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#cross-menu").stop().animate({scale:'1.2',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#cross-menu', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#cross-menu").stop().animate({scale:'1',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* MENU SIDE CLOSE */

        var MENUSIDECLOSE = document.getElementById('cross-menu');

        MENUSIDECLOSE.addEventListener('click', function() {
          $("#main-container-menu").stop().animate({'left':'-100%'},300);	
      }); 

        /* BOUTON MENU ARROW-2 */

        $(document).on('touchstart mouseover', '#wrapper-title-2', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#fleche-nav-2").stop().animate({rotate: '90deg',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#wrapper-title-2', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#fleche-nav-2").stop().animate({rotate: '0deg',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* BOUTON MENU ARROW-3 */

        $(document).on('touchstart mouseover', '#wrapper-title-3', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#fleche-nav-3").stop().animate({rotate: '90deg',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#wrapper-title-3', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#fleche-nav-3").stop().animate({rotate: '0deg',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* BOUTON MENU */

        $(document).on('touchstart mouseover', '#stripes', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#stripes").stop().animate({scale:'1.2',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#stripes', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#stripes").stop().animate({scale:'1',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* BOUTON NEXT */

        $(document).on('touchstart mouseover', '#oldnew-next', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#oldnew-next").stop().animate({scale:'1.2',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#oldnew-next', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#oldnew-next").stop().animate({scale:'1',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        /* BOUTON PREV */

        $(document).on('touchstart mouseover', '#oldnew-prev', function(event){

            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#oldnew-prev").stop().animate({scale:'1.2',opacity:'0.5'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });

        $(document).on('touchend mouseout', '#oldnew-prev', function(event){
           
            event.stopPropagation();
            event.preventDefault();
            if(event.handled !== true) {
             
              $("#oldnew-prev").stop().animate({scale:'1',opacity:'1'},300);	

              event.handled = true;
          } else {
            return false;
        }
    });


        /*FORMULAIRE NEWSLETTER*/
        
        $("form").on("submit", function(event) {
          event.preventDefault();
  $.post("/burstfly/form-burstfly-modified.asp",$("form").serialize(), function(data) {//alert(data);
  });
});

        /* PRELOADER */

        function preloader() {
           if (document.images) {
              var img1 = new Image();
              var img2 = new Image();
              var img3 = new Image();
              var img4 = new Image();
              var img5 = new Image();
              var img6 = new Image();
              var img7 = new Image();
              var img8 = new Image();
              var img9 = new Image();
              var img10 = new Image();
              var img11 = new Image();
              var img12 = new Image();
              var img13 = new Image();
              var img14 = new Image();
              var img15 = new Image();
              var img16 = new Image();
              var img17 = new Image();
              var img18 = new Image();
              var img19 = new Image();
              var img20 = new Image();

              img1.src = "{{URL::to('/')}}/img/psd-4.jpg";
              img2.src = "{{URL::to('/')}}/img/font-1.jpg";
              img3.src = "{{URL::to('/')}}/img/psd-1.jpg";
              img4.src = "{{URL::to('/')}}/img/psd-2.jpg";
              img5.src = "{{URL::to('/')}}/img/ai-1.jpg";
              img6.src = "{{URL::to('/')}}/img/theme-2.jpg";
              img7.src = "{{URL::to('/')}}/img/psd-3.jpg";
              img8.src = "{{URL::to('/')}}/img/font-2.jpg";
              img9.src = "{{URL::to('/')}}/img/font-3.jpg";
              img10.src = "{{URL::to('/')}}/img/ai-2.jpg";
              img11.src = "{{URL::to('/')}}/img/icons-1.jpg";
              img12.src = "{{URL::to('/')}}/img/ui-1.jpg";
              img13.src = "{{URL::to('/')}}/img/font-5.jpg";
              img14.src = "{{URL::to('/')}}/img/theme-2.jpg";
              img15.src = "{{URL::to('/')}}/img/psd-5.jpg";
              img16.src = "{{URL::to('/')}}/img/icons-3.jpg";
              img17.src = "{{URL::to('/')}}/img/font-4.jpg";
              img18.src = "{{URL::to('/')}}/img/theme-3.jpg";
              img19.src = "{{URL::to('/')}}/img/font-6.jpg";
              img20.src = "{{URL::to('/')}}/img/theme-4.jpg";
          }
      }
      function addLoadEvent(func) {
       var oldonload = window.onload;
       if (typeof window.onload != 'function') {
          window.onload = func;
      } else {
          window.onload = function() {
             if (oldonload) {
                oldonload();
            }
            func();
        }
    }
}
addLoadEvent(preloader);

</script>


</body>


</html>
