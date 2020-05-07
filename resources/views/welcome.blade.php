@include('layouts.admin_head')
  <div id="app">
  	  <nav-bar></nav-bar>
    	<div class="page-container">
    		<div class="page-content">

          <side-bar></side-bar>
    				
    			<div class="content-wrapper">

    			    <page-header></page-header>

      				<div class="content">

                  <router-view></router-view>

        					<div class="footer text-muted">
        						&copy; 2019. <a href="#">Hospital ERP</a> by <a href="#" target="_blank">...</a>
        					</div>
      				</div>
    			</div>
    		</div>
    	</div>
  </div>
  @include('layouts.admin_js')
</body>
</html>
