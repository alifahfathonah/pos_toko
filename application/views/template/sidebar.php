<style>


 .page-content-wrapper{
	margin-top: 50px;
 }
 .page-sidebar-menu  .page-header-fixed {
	 padding-top: 43px;
 }


</style>
<!-- Content Wrapper. Contains page content -->
  <!-- Left side column. contains the sidebar -->
  <div class="page-sidebar-wrapper">
	  <!-- BEGIN SIDEBAR -->
	  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	  <div class="page-sidebar navbar-collapse collapse" style="margin-top:50px;">
		  <!-- BEGIN SIDEBAR MENU -->
		  <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		  <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		  <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		  <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		  <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		  <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			  <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			  <li class="sidebar-toggler-wrapper hide">
				  <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				  <div class="sidebar-toggler">
					  <span></span>
				  </div>
				  <!-- END SIDEBAR TOGGLER BUTTON -->
			  </li>
			  <li class="nav-item start active open">
				  <a href="<?php echo base_url('admin')?>" class="nav-link nav-toggle">
					  <i class="icon-home"></i>
					  <span class="title">Dashboard</span>
				  </a>
			  </li>
			  <?php
				$where_sidebar_url  = array('sidebar_url' => $this->uri->segment(1));
				$sidebar_lv1_active = $controller->select_config_one('sidebar', 'sidebar_parent', $where_sidebar_url);
				foreach ($sidebar_lv1 as $r_sidebar_lv1){?>
					<li <?php if ($r_sidebar_lv1->sidebar_id==$sidebar_lv1_active->sidebar_parent){
					echo 'class="nav-item start "';} else { echo 'class="nav-item start "'; }?>>
						<a href="<?php echo base_url($r_sidebar_lv2->sidebar_url) ?>" class=" nav-link nav-toggle">
							<i class="<?php echo $r_sidebar_lv1->sidebar_icon?>"></i>
							<span class="title"><?php echo $r_sidebar_lv1->sidebar_name?></span>
							<span class="arrow"></span>
						</a>
						<ul class="sub-menu">
					<?php
							$sidebar_lv2 = $controller->sidebar_lv2($r_sidebar_lv1->sidebar_id);
							foreach ($sidebar_lv2->result() as $r_sidebar_lv2) {?>

									<li class="nav-item start ">
									  <a href="<?php echo base_url($r_sidebar_lv2->sidebar_url) ?>"  class="nav-link ">
										   <span class="title"><?php echo $r_sidebar_lv2->sidebar_name?></span>
									  </a>
									</li>

								<?php } ?>
						</ul>
					</li>
				<?php } ?>
        <!-- <li class="nav-item">
          <a href="<?php echo base_url('payment')?>" class="nav-link nav-toggle">
            <i class="fa fa-money"></i>
            <span class="title">Payment</span>
          </a>
        </li> -->
		  </ul>
		  <!-- END SIDEBAR MENU -->
		  <!-- END SIDEBAR MENU -->
	  </div>
	  <!-- END SIDEBAR -->
  </div>
              <!-- END SIDEBAR -->
              <!-- BEGIN CONTENT -->
  <!-- =============================================== -->

<div class="page-content-wrapper">
