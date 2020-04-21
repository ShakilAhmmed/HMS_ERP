@include('layouts.admin_head')
  <div id="app">
  	<!-- Main navbar -->
  	@include('layouts.admin_nav')
  	<!-- /main navbar -->


  	<!-- Page container -->
  	<div class="page-container">

  		<!-- Page content -->
  		<div class="page-content">

  			<!-- Main sidebar -->
  			<div class="sidebar sidebar-main">
  				<div class="sidebar-content">

  					<!-- User menu -->
  					<div class="sidebar-user">
  						<div class="category-content">
  							<div class="media">
  								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
  								<div class="media-body">
  									<span class="media-heading text-semibold">Victoria Baker</span>
  									<div class="text-size-mini text-muted">
  										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
  									</div>
  								</div>

  								<div class="media-right media-middle">
  									<ul class="icons-list">
  										<li>
  											<a href="#"><i class="icon-cog3"></i></a>
  										</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  					<!-- /user menu -->

            @include('layouts.admin_sidebar')
  					<!-- Main navigation -->

  					<!-- /main navigation -->

  				</div>
  			</div>
  			<!-- /main sidebar -->


  			<!-- Main content -->
  			<div class="content-wrapper">

  			    @include('layouts.admin_page_header')
  				<!-- /page header -->


  				<!-- Content area -->
  				<div class="content">

                        <router-view></router-view>

  					<div class="footer text-muted">
  						&copy; 2019. <a href="#">Hospital ERP</a> by <a href="#" target="_blank">...</a>
  					</div>
  					<!-- /footer -->

  				</div>
  				<!-- /content area -->

  			</div>
  			<!-- /main content -->

  		</div>
  		<!-- /page content -->

  	</div>
  	<!-- /page container -->
    <!-- Core JS files -->
  </div>
  @include('layouts.admin_js')
</body>
</html>
