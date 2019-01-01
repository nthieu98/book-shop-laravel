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
	@guest
	<div class="pull-right">
		<span class="btn btn-mini">0</span>
		<a ><span class="">VND</span></a>
		<a ><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 0 ] Items in your cart </span> </a> 
	</div>
	@else
	<div class="pull-right">
		<span class="btn btn-mini">{{$cartTotal}}</span>
		<a ><span class="">VND</span></a>
		<a href="{{url('checkout/'.Auth::user()->id) }}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ {{$cartNum}} ] Items in your cart </span> </a> 
	</div>
	@endguest
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
		<li class=""><a href="{{ url('/view-order/'.Auth::user()->id ) }}">My Orders</a></li>
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
<div class = "container">
	<section id="form">
		<div class="page-header">
			<h3>Order List</h3>
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
			<div class = "container">
			<div class = "span9">
				
				@foreach ($orders as $order)
					<form class = "well form-inline" method = "post" action="{{url('/checkout/'.Auth::user()->id )}}">
						{{csrf_field()}}
						<label style = "width:220px">
							<h4>Order ID: {{$order->orderId}}</h4>
							<h4>Address: {{$order->orderAddress}}</h4>
							<h4>Date: {{date("d-m-Y", strtotime($order->orderDate)) }}</h4>
							<h4>Status: {{$order->orderStatus}}</h4>
							
						</label>
						@if($order->orderStatus == "Processing")
							<label>
								<a href="{{url('/cancel-order/'.Auth::user()->id.'/'.$order->orderId )}}" class="btn btn-danger" type = "submit">Cancel Order</a>
							</label>
						@else
						@endif
						@if($order->orderStatus != "Cancelled")
						<label>
						<div class = "container">
							
								<a class = "btn btn-success" data-toggle="collapse" data-target="#demo{{$order->orderId}}">View Details</a>
						
								<div id="demo{{$order->orderId}}" class="collapse">
									<div class = "span6">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>

												@foreach($orderDetails as $orderDe)
													@if($orderDe->orderId == $order->orderId)
													<tr>
														<td>{{$orderDe->name}}</td>
														<td>{{$orderDe->quantity}}</td>
														<td>{{$orderDe->price}} đ</td>
														<td>{{$orderDe->quantity*$orderDe->price}} đ</td>
													</tr>
													@endif
												@endforeach	

											</tbody>	
										
										</table>
										<h3> Total: {{$order->orderTotal}} đ</h3>
									</div>
								</div>
						</div>
						</label>	
						@endif
					</form>
					
				@endforeach
				</div>
			</div>
		</div>
	</section>
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
<span id="themesBtn"></span>
</body>
<!-- <script src="{{URL::asset('js/login.js')}}"></script> -->
</html>