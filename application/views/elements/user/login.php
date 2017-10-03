
        <section>
            <div class="container">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- <div class="login-panel-logo">
                                <img src="<?php echo base_url() ?>assets/images/logo-main.png" class="img-responsive">
                            </div> -->
                            <div class="login-form">
                                <form id="form-login" action="<?php echo base_url() . 'auth/verify' ?>" method="post">
                                    <h2 class="text-center"><b>Login </b>or register</h2>
                                    <div class="alert alert-block alert-dismissable alert-danger <?php echo ( $this->session->flashdata("Error") ) ? "show" : "hide"; ?>">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $this->session->flashdata("Error"); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id="username" tabindex="1" class="form-control"
                                               placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control"
                                               placeholder="Password">
                                    </div>
                                    <div class="row login-form-link">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right col-sm-6 col-xs-6">
                                            <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-login">Login</button>
                                </form>
                                <p class="already-login text-center">Don't have an account? <a href="<?=  base_url('auth/signup')?>">Sign Up
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>