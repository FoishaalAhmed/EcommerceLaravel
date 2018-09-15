<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layout.head')
	
</head>

<body>
	@include('admin.layout.header')	
	
	<div class="container-fluid-full">
	<div class="row-fluid">
	@include('admin.layout.sideber')

	@section('main-content')
	
	@show

	@include('admin.layout.footer')
	
</body>
</html>