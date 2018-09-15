@extends('admin.layout.app')
@section('main-content')
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{route('admin-home')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="{{route('profile.index')}}">Profile</a>
				</li>
			</ul>
			@include('message.message')
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Profile</h2>
						
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{route('profile.update',$admin->id)}}" method="post">
							@csrf
							{{method_field('PUT')}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="admin_name" value="{{$admin->admin_name}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Email</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="email" value="{{$admin->email}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Phone</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="phone" value="{{$admin->phone}}">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			<br>
			<br>
			<br>
			<br>
			<br>
    

	</div><!--/.fluid-container-->
		
	
	
	<div class="clearfix"></div>

	
	<div class="clearfix"></div>
@endsection
