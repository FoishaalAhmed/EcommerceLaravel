<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{route('admin-home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a href="{{route('category.create')}}"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Category</span></a></li>
						<li><a href="{{route('category.index')}}"><i class="icon-tasks"></i><span class="hidden-tablet"> All Category</span></a></li>
						<li><a href="{{route('brand.create')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Brand</span></a></li>
						<li><a href="{{route('brand.index')}}"><i class="icon-dashboard"></i><span class="hidden-tablet"> All Brand</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Product</span></a>
							<ul>
								<li><a class="submenu" href="{{route('product.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Product</span></a></li>
								<li><a class="submenu" href="{{route('product.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Product</span></a></li>
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-edit"></i><span class="hidden-tablet"> Slider</span></a>
							<ul>
								<li><a class="submenu" href="{{route('slider.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Slider</span></a></li>
								<li><a class="submenu" href="{{route('slider.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Slider</span></a></li>
							</ul>	
						</li>
						<li><a href="{{URL::to('admin/order')}}"><i class="icon-list-alt"></i><span class="hidden-tablet"> Manage Order</span></a></li>
						<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Shop Name</span></a></li>
						<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Delevery Man</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->