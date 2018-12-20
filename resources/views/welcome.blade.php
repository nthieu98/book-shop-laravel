<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Book shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="{{asset('themes/bootshop/bootstrap.min.css')}}" media="screen"/>
    <link href="{{asset('themes/css/base.css')}}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{asset('themes/css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('themes/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{asset('themes/js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{asset('themes/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong>
	@guest
		User
	@else
	{{ Auth::user()->name }}
	@endguest
	</strong></div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini">{{$cartTotal}}</span>
		<a href="product_summary.html"><span class="">VND</span></a>
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ {{$cartNum}} ] Items in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="{{ route('welcome') }}"><img src="{{asset('themes/images/logo.jpg')}}" alt=""/></a>
		<form class="form-inline navbar-search" method="post" action="{{url('/search')}}" >{{csrf_field()}}
		<input id="srchField" class="srchTxt" type="text" name = "srchField" placeholder = "Search"/>
		<select class="srchTxt" id ="srchTxt" name = "srchTxt" style= "width:150px">
			<option value="all" selected>All</option>
			@foreach ($categories as $cat)
				<option value = "{{$cat->categoryName}}">{{$cat->categoryName}}</option>
			@endforeach
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <!-- <li class=""><a href="special_offer.html">Specials Offer</a></li> -->

	 @guest
		<li class=""><a role="button" style="padding-right:0"href="{{ route('register') }}" ><span class="btn btn-large btn-success">Register</span></a><li>
			<!-- <a role="button" style="padding-right:0"href="{{ route('login') }}" ><span class="btn btn-large btn-success">Register</span></a> -->
		<li><a role="button" style="padding-right:0"href="{{ route('login') }}" ><span class="btn btn-large btn-success">Login</span></a></li>
	@else
		<li class=""><a href="normal.html">My Orders</a></li>
		<li class=""><a href="{{ url('/checkout/'.Auth::user()->id ) }}"> Checkout</a></li>
		<li class=""><a href="{{ url('/profile/'.Auth::user()->id	) }}">Profile</a></li>
		<li class=""><a href="{{ route('logout') }}">Logout</a></li>
	@endguest
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a ><img src="{{asset('themes/images/carousel/2.jpg')}}" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a><img src="{{asset('themes/images/carousel/1.jpg')}}" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a ><img src="{{asset('themes/images/carousel/5.jpg')}}"alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a ><img src="{{asset('themes/images/carousel/4.jpg')}}" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		   
		  </div>
		  </div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">

		<h4>Latest Products </h4>
			  <ul class="thumbnails">
				@foreach ($productsAll as $pro)
					<li class="span3">
						<div class="thumbnail">
						<a ><img style="width: 200px; display: inline;" src="{{ asset('/images/backend_images/product/medium/'.$pro->productImage) }}" alt=""/></a>
						<div class="caption">
							<h5 >{{$pro->productName}}</h5>
							<!-- <p> 
							{{$pro->productName}}
							</p>
						 -->
							<h4 style="text-align:center">
							<a class="btn" href="{{url('product/'.$pro->productId)}}"> <i class="icon-zoom-in"></i></a> 
							@guest
							<a class="btn" >Add to <i class="icon-shopping-cart"></i></a> 
							@else
							<a class="btn" href="{{url('/'.Auth::id().'/'.$pro->productId)}}">Add to <i class="icon-shopping-cart"></i></a> 
							@endguest
							<a class="btn btn-primary">{{$pro->productPrice}} đ</a></h4>
						</div>
						</div>
					</li>
				@endforeach
				
			  </ul>	

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ABOUT BOOK SHOP</h5>
				<a >ABOUT US</a>
				<a >OUR CAREERS</a> 
				<a >OUR POLICIES</a> 

			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a >CONTACT</a>  
				<a >REGISTRATION</a>  
				<a >LEGAL NOTICE</a>  
				<a >TERMS AND CONDITIONS</a> 
				<a >FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a >NEW PRODUCTS</a> 
				<a >TOP SELLERS</a>
				<a >SPECIAL OFFERS</a>  
				<a >MANUFACTURERS</a> 
				<a>SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA</h5>
				<a ><img width="60" height="60" src="{{asset('themes/images/facebook.png')}}" title="facebook" alt="facebook"/></a>
				<a ><img width="60" height="60" src="{{asset('themes/images/twitter.png')}}" title="twitter" alt="twitter"/></a>
				<a ><img width="60" height="60" src="{{asset('themes/images/youtube.png')}}" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Book shop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="{{asset('themes/js/jquery.js')}}" type="text/javascript"></script>
	<script src="{{asset('themes/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('themes/js/google-code-prettify/prettify.js')}}"></script>
	
	<script src="{{asset('themes/js/bootshop.js')}}"></script>
    <script src="{{asset('themes/js/jquery.lightbox-0.5.js')}}"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
<!-- <script src="{{URL::asset('js/login.js')}}"></script> -->
</html>