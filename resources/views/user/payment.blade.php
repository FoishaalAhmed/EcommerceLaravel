@extends('user.layout.app')

@section('main-content')
	
	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				@php
					$contents = Cart::content();
				@endphp
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total(inc.tax)</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="/uploaded_files/product-img/{{$content->options->image}}" alt="" height="50px" width="50px"></a>
							</td>
							<td class="cart_price">
								<p>{{$content->name}}</p>
							</td>
							<td class="cart_price">
								<p>{{$content->price}} TK</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="3"/>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}} TK</p>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
						<div class="payment-options">
							<h2>Review & Payment</h2>
								<form action="{{url('/user/order_place')}}" method="post">
									@csrf
									<span>
										<label><input type="radio" name="payment_method" value="handcash"> Hand Cash</label>
									</span>
									<span>
										<label><input type="radio" name="payment_method" value="bkash"> Bkash</label>
									</span>

									<span>
										<input type="submit"  value="Done">
									</span>

								</form>
						</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	
									

	@endsection
	
	
