@extends('user.layout.app')

@section('main-content')
	
	<section id="form"><!--form-->
		<div class="container">
			@include('message.message')
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL::to('user/login')}}" method="post">
							@csrf
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="password" placeholder="Password" name="customer_password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/user/registration')}}" method="post">
							@csrf
							<input type="text" placeholder="Name" name="customer_name" />
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="text" placeholder="Phone Number" name="customer_phone" />
							<input type="password" placeholder="Password" name="customer_password" />
							<input type="password" placeholder="Confirm Password" name="password_confirmation" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection
	
	
