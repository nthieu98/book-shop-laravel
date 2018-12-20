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
<!-- <script src = "{{asset('js/app.js')}}"></script>  -->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ {{$cartTotal}} ] Items in your cart </span> </a> 
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
	 <li class=""><a href="normal.html">Delivery</a></li>
	 <li class=""><a href="contact.html">Contact</a></li>
	 @guest
		<li class=""><a role="button" style="padding-right:0"href="{{ route('register') }}" ><span class="btn btn-large btn-success">Register</span></a><li>
			<!-- <a role="button" style="padding-right:0"href="{{ route('login') }}" ><span class="btn btn-large btn-success">Register</span></a> -->
		<li><a role="button" style="padding-right:0"href="{{ route('login') }}" ><span class="btn btn-large btn-success">Login</span></a></li>
	@else
		<li class=""><a href="{{ url('/profile/'.Auth::user()->id	) }}">Profile</a></li>
	 <li class=""><a href="{{ route('logout') }}">Logout</a></li>
	@endguest
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div class = "container">
<section id="form">
  <div class="page-header">
      <h3>Profile</h3>
    </div>
  @if(Session::has('flash_message_error'))
          <div class="alert alert-error alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{!! session('flash_message_error') !!}</strong>
          </div>
      @endif   
      @if(Session::has('flash_message_success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{!! session('flash_message_success') !!}</strong>
          </div>
      @endif
<div class="row-fluid">
  
  <div class = "span8">
  <form class="form-horizontal" method = "post" action="{{ url('profile/'.$user->id) }}">{{csrf_field()}}
    <fieldset>
    <div class="control-group">
        <label for="name" class="control-label">Name* </label> 
        <div class="controls">
          <input id="name" name="name" placeholder="Name" class="input-xlarge" type="text" value = "{{$user->name}}" required>
        </div>
      </div>
      <div class="control-group">
        <label for="username" class="control-label">Username </label> 
        <div class="controls">
          <input id="username0" name="username0" placeholder="Username" class="input-xlarge" required="required" type="text" disabled value = "{{$user->username}}">
          <input id="username" name="username" type="hidden"  value = "{{$user->username}}">
        </div>
      </div>
      
      <div class="control-group">
        <label for="lastname" class="control-label">Password </label> 
        <div class="controls">
          <input id="password" name="password" placeholder="Password" class="input-xlarge" type="password" value = "{{$user->password}}" required>
        </div>
      </div>
      <div class="control-group">
        <label for="text" class="control-label">Confirm Password </label> 
        <div class="controls">
          <input id="password-confirm" name="password_confirmation" placeholder="Confirm Password" class="input-xlarge" required="required" type="password" value = "{{$user->password}}">
        </div>
      </div>
      <div class="control-group">
        <label for="select" class="control-label">Male </label> 
        <div class="controls">
          <select id="male" name="male" class="custom-select">
            <?php echo $males_drop_down; ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label for="email" class="control-label">Email* </label> 
        <div class="controls">
          <input id="email" name="email" placeholder="Email" class="input-xlarge" required="required" type="text"  value = "{{$user->email}}">
        </div>
      </div>
      <div class="control-group">
        <label for="website" class="control-label">Birthday </label> 
        <div class="controls">
          <input id="birthday" name="birthday" placeholder="Birthday" class="input-xlarge" type="date" value = "{{$user->birthday}}">
        </div>
      </div>
      <div class="control-group">
        <label for="publicinfo" class="control-label">Phone Number </label> 
        <div class="controls">
        <input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="input-xlarge" type="text" value = "{{$user->phoneNumber}}">                                </div>
      </div>
      <div class="form-actions">
          <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
      </div>
    </fieldset>
  </form>
  </div>
  </div>
</section>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a> 
				<a href="login.html">ADDRESSES</a> 
				<a href="login.html">DISCOUNT</a>  
				<a href="login.html">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.html">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="{{asset('themes/images/facebook.png')}}" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="{{asset('themes/images/twitter.png')}}" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="{{asset('themes/images/youtube.png')}}" title="youtube" alt="youtube"/></a>
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
<span id="themesBtn"></span>
</body>
<!-- <script src="{{URL::asset('js/login.js')}}"></script> -->
</html>