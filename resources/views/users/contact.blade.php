<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
  <style>

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}



.about-detail{
  height: 100px;
  line-height: 100px;
  text-align: center;
  margin-top: 70px;
}



.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

    </style>
<title>Ebook : Providing For Ebook</title>
<link href="{{ asset('user_assest/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{{ asset('user_assest/css/style.css') }} " rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href="{{ asset('user_assest/css/style4.css') }}" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<script src="{{ asset('user_assest/js/jquery.min.js') }}"></script>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="{{ asset('user_assest/css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<!--header-->
<div class="header">
<div class="container">
		<div class="head">
			<div class=" logo">
				<a href="index.html"><img src="{{ asset('user_assest/images/logo.png') }}" alt=""></a>	
			</div>
		</div>
	</div>
	<div class="header-top">
		<div class="container">
		@if(session('username'))
		<div class="col-sm-5 col-md-offset-2  header-login" style="float:right;text-align:right">
					<ul>
						<li> <a href="{{ url('/userlogout') }}">Logout</a></li>
						<li><button>{{session('username')->name}}</button></li>
						
					</ul>
				</div>
       @else
	   <div class="col-sm-5 col-md-offset-2  header-login"  style="float:right;text-align:right">
					<ul>
						<li><a href='{{ url("/userlogin")}}'>Login</a></li>
						<li><a href='{{ url("/userregister")}}'>Register</a></li>
					</ul>
				</div>

	   @endelse
	   @endif
				
			
				<div class="clearfix"> </div>
		</div>
		</div>
		
		<div class="container">
		
			<div class="head-top">
			
		 <div class="col-sm-8 col-md-offset-2 h_menu4">
				<nav class="navbar nav_bottom" role="navigation">
 
 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
   </div> 
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
            <li><a class="color" href="{{ url('/')}}">Home</a></li>
            
    		<li class="dropdown mega-dropdown active">
			    <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>	
			    		
				<div class="dropdown-menu ">
                    <div class="menu-top">
					    @foreach($catdata as $cat)	
                        <div class="col1">
							<div class="h_nav">
								<h4>{{ $cat->category_name }}</h4>
									<ul>
									@foreach($subdata as $sub)	
									@if($sub->subcat_name == $cat->category_name)
									<li><a href='{{url("/product/$cat->category_name/$sub->subcategory_name")}}'>{{ $sub->subcategory_name }}</a></li>
									@endif
									@endforeach			
									</ul>	
							</div>							
						</div>
						@endforeach
					</div>                  
				</div>				
			</li>
			
			<li><a class="color4" href="/about">About</a></li>
            <li ><a class="color6" href="/contact">Contact</a></li>
        </ul>
     </div><!-- /.navbar-collapse -->

</nav>
			</div>
			<div class="col-sm-2 search-right">
				<ul class="heart">
				
					
					<div class="clearfix"> </div>
					
						<!----->

						<!---pop-up-box---->					  
			<link href="{{ asset('user_assest/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
			<script src="{{ asset('user_assest/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
			<!---//pop-up-box---->
			<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
					<div class="login-search">
						<input type="submit" value="">
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">		
					</div>
					<p>Ebook</p>
				</div>				
			</div>
		 <script>
			$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
			});
																						
			});
		</script>		
						<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>


<!----------------------------------------------------------------------------------------->

<h2 style="text-align:center;margin-top:40px;" >Our Team</h2>
<div class="row" style="margin-top:50px;">
  <div class="column">
    <div class="card">
        <div class="container" style="width:400px; height:200px;">
        <h2 style="margin:30px;">Nikunj Nasit</h2><br>
        <p>Enrollment N0. - 170430116079</p><br>
        <p>gmail - nikunjnasit81299@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
        <div class="container" style="width:400px; height:200px;">
        <h2 style="margin:30px;">Jaydeep Tanti</h2><br>
        <p>Enrollment N0. - 170430116113</p><br>
        <p>gmail - jaydeeptanti151199@gmail.com</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
        <div class="container" style="width:400px; height:200px; ">
        <h2 style="margin:30px;">Chintan Vaghasiya</h2><br>
        <p>Enrollment N0. - 170430116117</p><br>
        <p>gmail - chintanvaghasiya59@gmail.com</p>
        </div>
    </div>
  </div>
</div>


<!----------------------------------------------------------------------------------------->


<!--//footer-->
	<div class="footer">
	<div class="footer-middle">
				<div class="container">
				<div class=" rsidebar span_1_of_left footer-middle-in" style="float:left;">
						<h6 class="cate" >Categories</h6>
						@foreach($catdata as $cat)
							<ul class="menu-drop">
							<li class="item1"><a href="#">{{ $cat->category_name}}</a>
							    @foreach($subdata as $sub)	
								@if($sub->subcat_name == $cat->category_name)
								<ul class="cute">
									<li class="subitem1"><a href='{{url("/product/$cat->category_name/$sub->subcategory_name")}}'>{{ $sub->subcategory_name}}</a></li>
								</ul>
								@endif
								@endforeach	
							</li>
							</ul>
						@endforeach
			</div>
			
					
					<div class="col-md-3 footer-middle-in" style="margin-left:200px">
						<h6>Information</h6>
						<ul class=" in">
						    <li><a href="/about">About</a></li>
							<li><a href="/contact">Contact Us</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 footer-middle-in" style="margin-left:200px">
						<h6>Tags</h6>
						<ul class="tag-in">
							<li><a href='{{url("/product/Fiction/Drama")}}'>Drama</a></li>
							<li><a href='{{url("/product/Non-Fiction/Advertising")}}'>Advertising</a></li>
							<li><a href='{{url("/product/Academic/archieves")}}'>Archieves</a></li>
							<li><a href='{{url("/product/Textbooks/Mathematics")}}'>Mathematics</a></li>
							<li><a href='{{url("/product/Other/Magazine")}}'>Magazine</a></li>
							<li><a href='{{url("/product/classic/scifi_classic")}}'>Scifi_Classic</a></li>
							<li><a href='{{url("/product/Academic/Academic_article")}}'>Academic_article</a></li>
						</ul>
					</div>
					
				</div>
			</div>
			
		</div>
		<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('user_assest/js/simpleCart.min.js') }}"> </script>
<!-- slide -->
<script src="{{ asset('user_assest/js/bootstrap.min.js') }}"></script>
<!--light-box-files -->
		<script src="{{ asset('user_assest/js/jquery.chocolat.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('user_assest/css/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>

		


</body>
</html>