@include('admin.layouts.head')
@include('admin.layouts.header')
<!-- BEGIN CONTAINER -->
<div class="page-container">
	@include('admin.layouts.menu')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
	    <!-- BEGIN CONTENT BODY -->
	    <div class="page-content">
	        <!-- BEGIN PAGE HEADER-->
		    @yield('content')
        	<div class="clearfix"></div>
        	<!-- END DASHBOARD STATS 1-->
    	</div>
    	<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@include('admin.layouts.footer')
@include('admin.layouts.foot')