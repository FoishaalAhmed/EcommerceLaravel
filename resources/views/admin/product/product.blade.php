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
			<i class="icon-edit"></i>
			<a href="{{route('product.create')}}">Add Product</a>
		</li>
	</ul>
	@include('message.message')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Name</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="Product_name">
					  </div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Select Category </label>
						<div class="controls">
						  <select id="selectError3" name="category_id">
						  	<option>Select Category </option>
						  	@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->category_name}}</option>
						  	@endforeach
						  </select>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="selectError3">Select Brand </label>
						<div class="controls">
						  <select id="selectError3" name="brand_id">
						  	<option>Select brands </option>
						  	@foreach ($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
						  	@endforeach
						  </select>
						</div>
					 </div> 

					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Product Short Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" name="short_description"></textarea>
					  </div>
					</div>
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Product Long Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" name="long_description"></textarea>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Price</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="price">
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="fileInput">Product Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="image">
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Size</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="size">
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Color</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="color">
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Product</button>
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
