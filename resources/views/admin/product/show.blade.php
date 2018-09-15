@extends('admin.layout.app')
@section('main-content')

	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('admin-home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{route('product.index')}}">All Product</a></li>
			</ul>
			@include('message.message')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial</th>
								  <th>Name</th>
								  <th>Brand Name</th>
								  <th>Category Name</th>
								  <th>Price</th>
								  <th>Image</th>
								  <th>Size</th>
								  <th>Color</th>
								  <th>Edit</th>
								  <th>Delete</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($products as $product)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td class="center">{{$product->Product_name}}</td>
								<td class="center">{{$product->brand_name}}</td>
								<td class="center">{{$product->category_name}}</td>
								<td class="center">{{$product->price}}</td>
								<td class="center"><img src="/uploaded_files/product-img/{{$product->image}}" alt="" width="50px" height="50px"></td>
								<td class="center">{{$product->size}}</td>
								<td class="center">{{$product->color}}</td>
								<td class="center">
									<a class="btn btn-info" href="{{route('product.edit',$product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

								</td>
								<td class="center">
									<form action="{{route('product.destroy',$product->id)}}" method="post" id="delete-form-{{ $product->id}}">
			                              @csrf
			                              {{method_field('DELETE')}}
			                        </form>

									<a class="btn btn-danger" style="margin-top: -10px" href="#" onclick="if(confirm('Are You Sure To Delete?')){
			                              event.preventDefault();
			                              getElementById('delete-form-{{ $product->id}}').submit();
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