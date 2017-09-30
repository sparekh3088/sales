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
			   		<a href="<?php base_url(); ?>" id="logo-big"><h1>Events</h1></a>
			   	</div>
			</aside>
			<div id="main" class="clearfix">
				<header id="header-main">
	            	<div class="header-main-top">
	                	<div class="pull-left">
	                    
	                    	<!-- * This is the responsive logo * --> 
	                                   
	                    	<a href="index.html" id="logo-small"><h4>karma</h4><h5>/webapp</h5></a>
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
	                            <li><a href="#">Home</a></li>
	                            <li><a href="#">Library</a></li>
	                            <li class="active">Data</li>
	                        </ul><!-- End .breadcrumb -->
	                    </div> 
	                    <div class="pull-right">
	                    	<p>Version 1.0.0</p>                        
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
	                            <h2>Dashboard</h2>                 
	                        </div> 
	                        <div class="pull-right">
	                            <div class="dropdown">
	                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
	                                    <i class="fa fa-comments"></i>
	                                    <span class="indicator-dot">3</span>
	                                </a>
	                                <div role="menu" class="dropdown-menu pull-center ext-dropdown-comments">
	                                    <div class="ext-dropdown-header">
	                                        <i class="fa fa-comments"></i> 
	                                        <h5>Comments</h5>
	                                        <a href="#" class="btn btn-default btn-sm delete-master"><i class="fa fa-trash-o"></i></a>
	                                        <span class="indicator-dot">3</span>
	                                    </div> 
	                                    <div class="ext-dropdown-comments-content">
	                                        <div>
	                                            <img src="images/users/user-1.jpg" alt="" class="avatar"/>
	                                            <a href="#">Karma, a good thing</a>
	                                            <ul>
	                                                <li><span>Posted by:</span> <a href="#">Steven</a></li>
	                                                <li><span>Date:</span> Dec 11, 2012</li>
	                                                <li>
	                                                    <span>Actions:</span> 
	                                                    <a href="#">Read</a> -
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <div>
	                                            <img src="images/users/user-4.jpg" alt="" class="avatar"/>
	                                            <a href="#">A simple, fast way to reduce stress</a>
	                                            <ul>
	                                                <li><span>Posted by:</span> <a href="#">Linda</a></li>
	                                                <li><span>Date:</span> Dec 3, 2012</li>
	                                                <li>
	                                                    <span>Actions:</span> 
	                                                    <a href="#">Read</a> -
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <div>
	                                            <img src="images/users/user-6.jpg" alt="" class="avatar"/>
	                                            <a href="#">Blog: karma and revenge</a>
	                                            <ul>
	                                                <li><span>Posted by:</span> <a href="#">Debra Hopper</a></li>
	                                                <li><span>Date:</span> Nov 18, 2012</li>
	                                                <li>
	                                                    <span>Actions:</span>  
	                                                    <a href="#">Read</a> -
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <span>No new comments</span>                                                                     	
	                                    </div>
	                                    <div class="ext-dropdown-footer">
	                                        <p>Updated: 11/12/2012 - 14:12</p>
	                                        <a href="#" class="btn btn-default btn-sm"><i class="fa fa-caret-right"></i></a>
	                                    </div> 
	                                </div>
	                            </div><!-- End .dropdown -->            
	                            <div class="btn-group">
	                                <a class="btn btn-default" href="#">
	                                    <i class="fa fa-star"></i>
	                                </a>                                         
	                                <a class="btn btn-default" href="#" id="modal-update-trigger">
	                                Modal
	                                </a>
	                                <a class="btn btn-default" href="#">
	                                    <i class="fa fa-cog"></i>
	                                </a>
	                            </div><!-- End .btn-group -->
	                            <div class="dropdown">
	                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
	                                    <i class="fa fa-inbox"></i>
	                                    <span class="indicator-dot">3</span>
	                                </a>
	                                <div role="menu" class="dropdown-menu pull-right ext-dropdown-inbox">
	                                    <div class="ext-dropdown-header">
	                                        <h5>Inbox</h5>
	                                        <a href="#" class="btn btn-default btn-sm delete-master"><i class="fa fa-trash-o"></i></a>
	                                        <span class="indicator-dot">3</span>
	                                    </div> 
	                                    <div class="ext-dropdown-inbox-content">
	                                        <div>
	                                            <a href="#">He did you get my new blog post?</a>
	                                            <ul class="nav">
	                                                <li><span>Send by:</span> <a href="#">Debra Hopper</a></li>
	                                                <li><span>Date:</span> Dec 12, 2012 - 14:03:09</li>
	                                                <li>
	                                                    <span>Actions:</span> 
	                                                    <a href="#">Reply</a> - 
	                                                    <a href="#">Read</a> -
	                                                    <a href="#">Spam</a> -  
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <div>
	                                            <a href="#">I really love your karma theme</a>
	                                            <ul class="nav">
	                                                <li><span>Send by:</span> <a href="#">Nathan Rupertson</a></li>
	                                                <li><span>Date:</span> Dec 3, 2012 - 22:44:12</li>
	                                                <li>
	                                                    <span>Actions:</span> 
	                                                    <a href="#">Reply</a> - 
	                                                    <a href="#">Read</a> -
	                                                    <a href="#">Spam</a> -  
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <div>
	                                            <a href="#">Feedback of a happy customer</a>
	                                            <ul class="nav">
	                                                <li><span>Send by:</span> <a href="#">Steven Watson</a></li>
	                                                <li><span>Date:</span> Dec 11, 2012 - 10:53:59</li>
	                                                <li>
	                                                    <span>Actions:</span> 
	                                                    <a href="#">Reply</a> - 
	                                                    <a href="#">Read</a> -
	                                                    <a href="#">Spam</a> -  
	                                                    <a href="#" class="delete">Delete</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <span>No new emails</span>                                                                      	
	                                    </div>
	                                    <div class="ext-dropdown-footer">
	                                        <div class="progress bar-small">
	                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
	                                                <span class="sr-only">60% Complete</span>
	                                            </div>
	                                        </div>
	                                        <p>60%</p>
	                                        <a href="#" class="btn btn-default btn-sm"><i class="fa fa-caret-right"></i></a>
	                                    </div>                  
	                                </div>
	                            </div><!-- End .dropdown -->
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
	                        	<a href="#" class="btn small-toggle-btn" data-toggle-sidebar="left"></a> 
	                            <a href="#" id="lockscreen-slider-trigger" class="btn">
	                                <i class="fa fa-lock"></i>&nbsp;  Lock screen
	                            </a> 
	                            <div class="dropdown">
	                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
	                                    <img src="images/icons/flags/shiny/16/United-Kingdom.png" alt=""/>
	                                    <i class="fa fa-caret-down"></i>
	                                </a>
	                                <ul role="menu" class="dropdown-menu ext-flags">
	                                    <li>
	                                        <a href="#">English <img src="images/icons/flags/shiny/16/United-Kingdom.png" alt=""/></a>
	                                    </li>
	                                    <li>
	                                        <a href="#">German <img src="images/icons/flags/shiny/16/Germany.png" alt=""/></a>
	                                    </li>
	                                    <li>
	                                        <a href="#">French <img src="images/icons/flags/shiny/16/France.png" alt=""/></a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Chinees <img src="images/icons/flags/shiny/16/China.png" alt=""/></a>
	                                    </li>
	                                </ul>
	                            </div>                          
	                        </div> 
	                        <div class="pull-right">
	                            <p>Some text here</p>
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