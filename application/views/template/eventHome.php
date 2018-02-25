<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8 no-js">      <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9 no-js">           <![endif]-->
<!--[if gt IE 9]>  <html class="no-js">                       <![endif]-->
<!--[if !IE]><!--> <html class="no-js">                       <!--<![endif]-->
	<?php $this->load->view('elements/head'); ?>
	<body>
		<div id="container" class="clearfix">
			<?php $this->load->view('elements/header'); ?>
			<aside id="sidebar-main" class="sidebar">
			      
			  	<div class="sidebar-logo">
			   		<a href="<?php base_url(); ?>" id="logo-big"><h1>Sales</h1></a>
			   	</div>
			   	<!-- ********** -->
	            <!-- NEW MODULE -->
	            <!-- ********** -->
	                    
	            <div class="sidebar-module"> 
	                <div class="sidebar-profile">
	                    <img src="<?= base_url() ?>assets/images/users/user-1.jpg" alt="" class="avatar"/>
	                    <span class="indicator-dot">2</span>
	                    <ul class="sidebar-profile-list">
	                        <li><h3>Hi, <?= $this->session->userdata('full_name') ?></h3></li>
	                        <li><a href="<?= base_url('profile') ?>">Profile</a> | <a href="<?=  base_url('auth/logout')?>">Logout</a></li>
	                    </ul>
	                </div><!-- End .sidebar-profile -->
	            </div><!-- End .sidebar-module -->

	            <div class="sidebar-line"><!-- A seperator line --></div>

	            <!-- ********** -->
                    <!-- NEW MODULE -->
                    <!-- ********** -->
                    
                    <div class="sidebar-module"> 
                        <nav class="sidebar-nav-v2">                         
                            <ul>
                                <li class="page-arrow active-page">
                                    <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('firms') ?>"><i class="fa fa-building-o"></i> Firms </a>
                                </li>    
                                <li>
                                    <a href="<?= base_url('category') ?>"><i class="fa fa-list"></i> Categories</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('products') ?>"><i class="fa fa-list-alt"></i> Products</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('orders') ?>"><i class="fa fa-calendar-o"></i> Orders</a>
                                </li>    
                                <li>
                                    <a href="<?= base_url('user/dealers') ?>"><i class="fa fa-calendar-o"></i> Dealers</a>
                                </li>    
                                <li>
                                    <a href="<?= base_url('user/supplier') ?>"><i class="fa fa-calendar-o"></i> Supplier/Seller</a>
                                </li>    
                                <li>
                                    <a href="<?= base_url('reports') ?>"><i class="fa fa-calendar-o"></i> Reports</a>
                                </li>    
                            </ul>
                        </nav><!-- End .sidebar-nav-v1 --> 
             		</div><!-- End .sidebar-module -->    
			</aside>
			<div id="main" class="clearfix">
				<header id="header-main">
	            	<div class="header-main-top">
	                	<div class="pull-left">
	                    
	                    	<!-- * This is the responsive logo * --> 
	                                   
	                    	<a href="index.html" id="logo-small"><h4>Sales</h4></a>
	                    </div>
	                    <div class="pull-right">
	                        
	                    	<!-- * This is the trigger that will show/hide the menu * -->
	                        <!-- * if the layout is in responsive mode              * -->
	                        
							<a href="#" id="responsive-menu-trigger">
	                        	<i class="fa fa-bars"></i>
	                        </a>
	                    </div>
	                </div><!-- End #header-main-top --> 
	                <div class="header-main-bottom">
	                	<div class="pull-left">
	                    	<ul class="breadcrumb">
	                    		<?php if(is_array($breadCrumb)) {
		                    		foreach($breadCrumb as $key => $bread) { ?>
		                            	<li><a href="<?= base_url($bread) ?>"><?= $key ?></a></li>
		                    		<?php } 
		                    		} else { ?>
		                            	<li><a href="<?= base_url() ?>">Home</a></li>
	                    		<?php } ?>
	                        </ul><!-- End .breadcrumb -->
	                    </div> 
	                </div><!-- End #header-main-bottom -->            
	            </header><!-- End #header-main --> 
	        
	            <div id="content" class="clearfix">

	            <!-- ********************************************
	                 * HEADER SEC:                              *
	                 *                                          *   
	                 * the part which contains the page title,  *
	                 * buttons and dropdowns.                   *
	                 ******************************************** -->
	                
	                <header id="header-sec"> 
	                	<div class="inner-padding"> 
	                        <div class="pull-left">
	                            <h2><?php echo $pageTitle; ?></h2>                 
	                        </div> 
	                        <div class="pull-right" style="<?= (!isset($showAdd) || !$showAdd )?'display: none;':0; ?>">
	                            <a href="<?= base_url(strtolower($pageSlug) . '/add') ?>"><?= 'Add ' . $pageTitle ?></a>
	                         </div>
	                    </div><!-- End .inner-padding -->    
	            	</header><!-- End #header-sec --> 

	                <!-- ********************************************
	                     * WINDOW:                                  *
	                     *                                          *
	                     * the part which contains the main content *
	                     ******************************************** -->
	                                     
	                <div class="window">  
	                    <div class="actionbar">
	                        <div class="pull-left">
	                        	<a href="#" class="btn" data-toggle-sidebar="left">
	                                <i class="fa fa-chevron-left"></i>
	                            </a>
	                        </div>
	                    </div><!-- End .actionbar-->
					<?php echo $body; ?>
					</div>
				</div>
			</div>
			<?php $this->load->view('elements/footer'); ?>
			<?php $this->load->view('elements/footer_scripts'); ?>
		</div>
	</body>
</html>