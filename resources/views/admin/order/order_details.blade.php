@extends('admin.layout.app')
@section('main-content')

	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('admin-home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('admin/order')}}">All Order</a></li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>Customer</th>
									  <th>Mobile</th>                                           
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach ($orders_by_id as $order)
									@endforeach
									<td>{{$order->customer_name}}</td>
									<td class="center">{{$order->customer_phone}}</td>
									                                       
								</tr>                                   
							  </tbody>
						 </table>     
					</div>
				</div><!--/span-->

				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>Shipping Name</th>
									  <th>Address</th>
									  <th>Mobile</th>                                           
									  <th>Email</th>                                           
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach ($orders_by_id as $order)
									@endforeach
									<td>{{$order->shipping_name}}</td>
									<td class="center">{{$order->shipping_address}}</td>
									<td class="center">{{$order->shipping_phone}}</td>
									<td class="center">{{$order->shipping_email}}</td>
									                                       
								</tr>                                   
							  </tbody>
						 </table>     
					</div>
				</div>
			</div><!--/row-->

			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Serial</th>
									  <th>Product Name</th>
									  <th>Product Price</th>                                         
									  <th>Product Quantity</th>                                         
									  <th>Total Price</th>                                         
								  </tr>
							  </thead>   
							  <tbody>
									@foreach ($orders_by_id as $order)
								<tr>
									
									<td>{{$loop->index+1}}</td>                                       
									<td>{{$order->product_name}}</td>                                       
									<td>{{$order->product_price}}</td>                                       
									<td>{{$order->product_quantity}}</td> 
									<td>{{$order->product_price * $order->product_quantity}}</td> 
								</tr>                                   
									@endforeach                                       
							  </tbody>
						 </table>     
					</div>
				</div><!--/span-->
			</div><!--/row-->

	</div><!--/.fluid-container-->

	<div class="clearfix"></div>
	<div class="clearfix"></div>
@endsection