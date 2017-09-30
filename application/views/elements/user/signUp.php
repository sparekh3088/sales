<section>
    <div class="container">
        <div class="panel-box">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="login-panel-logo">
                        <img src="<?php echo base_url() ?>assets/images/logo-main.png" class="img-responsive">
                    </div>
                    <div class="login-form">
                        <form id="form-login" action="<?php echo base_url() . 'auth/register' ?>" method="post">
                            <h2 class="text-center">Login or <b>register</b></h2>
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="text" name="first_name" id="username" tabindex="1" class="form-control"
                                       placeholder="First Name" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="username" tabindex="1" class="form-control"
                                       placeholder="Last Name" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone1" id="username" tabindex="1" class="form-control"
                                       placeholder="Phone Number" value="">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> I accept the terms of use</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login">Sign up</button>
                        </form>
                        <p class="text-center or"><br></p>
                        <div class="row row-collapse social-login">
                            <div class="col-md-6 ">
                                <a href="#">
                                    <div class="fb-box social-box">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>Sign Up with Facebook
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 ">
                                <a href="#">
                                    <div class="g-box social-box">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>Sign Up with Google+
                                    </div>
                                </a>
                            </div>
                        </div>
                        <p class="already-login text-center">Already a member? <a href="<?= base_url('auth/login') ?>">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>