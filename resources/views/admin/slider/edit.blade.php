@extends('admin.layout.app')
@section('main-content')

	<div id="content" class="span10">	
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{route('admin-home')}}">Home</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-home"></i>
			<a href="{{route('slider.index')}}">All Slider</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="{{route('slider.edit',$slider->id)}}">Update Slider</a>
		</li>
	</ul>
	@include('message.message')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Slider</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{method_field('PUT')}}
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="fileInput">Slider Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="image">
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Update Slider</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->

	</div><!--/.fluid-container-->	
	<div class="clearfix"></div>
	<div class="clearfix"></div>
@endsection
