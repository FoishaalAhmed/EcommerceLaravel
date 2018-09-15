@extends('user.layout.app')

@section('main-content')
	
	<section id="cart_items">
		<div class="container">

			<div class="register-req col-sm-6 col-sm-offset-3 text-center">
				<p>Please Fillup This Form For Shipping Details</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 col-sm-offset-3 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{URL::to('user/shiping-details')}}" method="post">
									@csrf
									<input type="text" placeholder="Name *" name="shipping_name">
									<input type="text" placeholder="Email*" name="shipping_email">
									<input type="text" placeholder="Address *" name="shipping_address">
									<input type="text" placeholder="Mobile Phone *" name="shipping_phone">
									<input type="text" placeholder="City *" name="shipping_city">
									<input type="submit" class="btn btn-primary" value="Submit">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->	

@endsection
	
	
