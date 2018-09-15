<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('user-home')}}"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								@php
									$customer_id = Session::get('id');
									$Shipping_id = Session::get('shipping_id');
								@endphp
								@if ($customer_id != NULL && $Shipping_id == NULL)
								<li><a href="{{URL::to('user/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								@elseif($customer_id != NULL && $Shipping_id != NULL)
								<li><a href="{{URL::to('user/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								@else
								<li><a href="{{URL::to('user/login')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								@endif
								<li><a href="{{URL::to('show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								@php
									$customer_id = Session::get('id');
								@endphp
								@if ($customer_id != NULL)
								<form action="{{route('user.logout')}}" method="post" id="logout-form">
					                @csrf
								<li><a href="{{route('user.logout')}}" onclick="event.preventDefault();
					                                   document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a></li>
								</form>
								@else
								<li><a href="{{URL::to('user/login')}}"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('user-home')}}" >Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('user-home')}}">Products</a></li>
		                                @php
											$customer_id = Session::get('id');
											$Shipping_id = Session::get('shipping_id');
										@endphp
										@if ($customer_id != NULL && $Shipping_id == NULL)
										<li><a href="{{URL::to('user/checkout')}}"> Checkout</a></li>
										@elseif($customer_id != NULL && $Shipping_id != NULL)
										<li><a href="{{URL::to('user/payment')}}"> Checkout</a></li>
										@else
										<li><a href="{{URL::to('user/login')}}"> Checkout</a></li>
										@endif 
										<li><a href="{{URL::to('show-cart')}}">Cart</a></li> 
                                    </ul>
                                </li> 
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->