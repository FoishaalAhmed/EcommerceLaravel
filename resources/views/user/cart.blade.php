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
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="/uploaded_files/product-img/{{$content->options->image}}" alt="" height="50px" width="50px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$content->price}} TK</p>
							</td>
							<td class="cart_quantity">
								<form action="{{URL::to('update-cart')}}" method="post">
									@csrf
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="3">
									<input  type="hidden" name="rowId" value="{{$content->rowId}}" >
									<input type="submit" value="Update" class="btn btn-sm btn-default">
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}} TK</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart',$content->rowId)}}"><i class="fa fa-times"></i></a>
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
					<div class="chose_area">
						<a class="btn btn-default check_out" href="{{URL::to('user-home')}}"><img src="{{asset('frontend/images/cart/shop.png')}}" alt=""></a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}} 
								@php
									/*$total = Cart::subtotal();
									$scost = 100;
									$grandtotal = $total + $scost;
									echo $grandtotal*/
								@endphp
							</span></li>
						</ul>
						@php
							$customer_id = Session::get('id');
							$Shipping_id = Session::get('shipping_id');
						@endphp
						@if ($customer_id != NULL && $Shipping_id == NULL)
							<a class="btn btn-default update" href="{{URL::to('user/checkout')}}">Check Out</a>
						@elseif($customer_id != NULL && $Shipping_id != NULL)
							<a class="btn btn-default update" href="{{URL::to('user/payment')}}">Check Out</a>
						@else
							<a class="btn btn-default update" href="{{URL::to('user/login')}}">Check Out</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	@endsection
	
	
