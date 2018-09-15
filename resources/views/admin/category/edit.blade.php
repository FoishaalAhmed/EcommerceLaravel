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
			<a href="{{route('category.index')}}">All Category</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="{{route('category.edit',$category->id)}}">Update Category</a>
		</li>
	</ul>
	@include('message.message')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{route('category.update',$category->id)}}" method="post">
					@csrf
					{{method_field('PUT')}}
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Category Name</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="category_name" value="{{$category->category_name}}">
					  </div>
					</div>         
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Category Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" name="description">{{$category->description}}</textarea>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Update Category</button>
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
