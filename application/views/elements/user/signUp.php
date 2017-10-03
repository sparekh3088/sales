<section>
    <div class="container">
        <div class="panel-box">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- <div class="login-panel-logo">
                        <img src="<?php echo base_url() ?>assets/images/logo-main.png" class="img-responsive">
                    </div> -->
                    <div class="login-form">
                        <form id="form-login" action="<?php echo base_url() . 'auth/register' ?>" method="post">
                            <h2 class="text-center">Login or <b>register</b></h2>
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="text" name="name" id="name" tabindex="1" class="form-control"
                                       placeholder="Full Name" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="username" tabindex="1" class="form-control"
                                       placeholder="Email Address" value="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control"
                                       placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-login">Sign up</button>
                        </form>
                        <p class="already-login text-center">Already a member? <a href="<?= base_url('auth/login') ?>">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>