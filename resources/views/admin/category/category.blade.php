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
			<a href="{{route('category.store')}}">Add Category</a>
		</li>
	</ul>
	@include('message.message')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{route('category.store')}}" method="post">
					@csrf
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Category Name</label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="category_name">
					  </div>
					</div>         
					<div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Category Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="textarea2" rows="3" name="description"></textarea>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Category</button>
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
