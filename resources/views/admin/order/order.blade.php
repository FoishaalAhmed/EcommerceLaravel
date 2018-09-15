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
			@include('message.message')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Order</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>View</th>
								  <th>Delete</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($orders as $order)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td class="center">{{$order->customer_name}}</td>
								<td class="center">{{$order->order_total}}</td>
								<td class="center">{{$order->order_status}}</td>
								<td class="center">
									<a class="btn btn-info" href="{{URL::to('/admin/order_details',$order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

								</td>
								<td class="center">
									<form action="{{URL::to('/admin/delete_order',$order->order_id)}}" method="post" id="delete-form-{{$order->order_id}}">
			                              @csrf
			                              {{method_field('DELETE')}}
			                        </form>

									<a class="btn btn-danger" style="margin-top: -10px" href="{{URL::to('/admin/delete_order',$order->order_id)}}" onclick="if(confirm('Are You Sure To Delete?')){
			                              event.preventDefault();
			                              getElementById('delete-form-{{ $order->order_id}}').submit();
			                            }else{
			                                event.preventDefault();
			                              }">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
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