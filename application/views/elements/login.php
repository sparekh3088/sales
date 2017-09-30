<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css"/>
<div id="container-loginmin" class="clearfix">
    <div class="alert alert-block alert-dismissable alert-danger <?php echo ( $this->session->flashdata("Error") ) ? "show" : "hide"; ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata("Error"); ?>
    </div>
    <div id="login-box">
        <div class="login-box-inner clearfix">
            <header id="login-header">
                <a href="<?= base_url() ?>" id="login-logo">
                    <h1>Events</h1>
                </a>
            </header>
            <div class="spacer-40"></div>   
            <form id="form-login" action="<?php echo base_url('admin') . '/auth/verify' ?>" method="post">
                <div class="row">  
                    <div class="col-lg-12">	
                        <input class="form-control input-lg" type="text" name="email" placeholder="Username" tabindex="1" value="" />
                    </div>
                </div>
                <div class="spacer-10"></div>  
                <div class="row">  
                    <div class="col-lg-12">	
                        <input class="form-control input-lg" name="password" type="password" placeholder="Password" tabindex="2" />
                    </div>
                </div>
                <div class="spacer-20"></div>	
                <div class="row">
                    <div class="col-lg-12">	
                        <!-- this needs to be a button/input element -->
                        <button class="btn btn-default btn-lg" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>