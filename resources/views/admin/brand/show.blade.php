@extends('admin.layout.app')
@section('main-content')

	<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('admin-home')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{route('brand.index')}}">All Brand</a></li>
			</ul>
			@include('message.message')

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Brand</h2>
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
								  <th>Edit</th>
								  <th>Delete</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($brands as $brand)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td class="center">{{$brand->brand_name}}</td>
								<td class="center">
									<a class="btn btn-info" href="{{route('brand.edit',$brand->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

								</td>
								<td class="center">
									<form action="{{route('brand.destroy',$brand->id)}}" method="post" id="delete-form-{{ $brand->id}}">
			                              @csrf
			                              {{method_field('DELETE')}}
			                        </form>

									<a class="btn btn-danger" style="margin-top: -10px" href="#" onclick="if(confirm('Are You Sure To Delete?')){
			                              event.preventDefault();
			                              getElementById('delete-form-{{ $brand->id}}').submit();
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