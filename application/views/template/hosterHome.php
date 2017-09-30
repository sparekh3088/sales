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
                <div class="sidebar-module"> 
                    <div class="sidebar-profile">
                        <img src="<?= base_url() ?>/assets/images/users/user-1.jpg" alt="" class="avatar"/>
                        <ul class="sidebar-profile-list">
                            <li><h3>Hi, <?= $this->session->full_name; ?></h3></li>
                            <li><a href="<?= base_url('admin/profile') ?>">Profile</a> | <a href="<?= base_url('admin/auth/logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-line"></div>
                <div class="sidebar-module"> 
                    <nav class="sidebar-nav-v2">                         
                        <ul>
                            <li class="<?= (uri_string() === 'hoster') ? 'page-arrow active-page' : '' ?>">
                                <a href="<?= base_url('admin/hoster') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class = "<?= (uri_string() === 'hoster/events') ? 'page-arrow active-page' : '' ?>">
                                <a href="<?= base_url('admin/hoster/events') ?>"><i class="fa fa-sun-o"></i> Events</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div id="main" class="clearfix">
                <header id="header-main">
                    <div class="header-main-top">
                        <div class="pull-left">
                            <a href="<?= base_url(); ?>" id="logo-small"><h4>Events</h4></a>
                        </div>
                        <div class="pull-right">
                            <a href="#" id="responsive-menu-trigger">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div> 
                </header> 
                <div id="content" class="clearfix">
                    <header id="header-sec"> 
                        <div class="inner-padding"> 
                            <div class="pull-left">
                                <h2><?php echo $pageTitle; ?></h2>                 
                            </div> 
                        </div>    
                    </header>        
                    <div class="window">
                        <?php echo $body; ?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('elements/footer'); ?>
            <?php $this->load->view('elements/footer_scripts'); ?>
        </div>
    </body>
</html>