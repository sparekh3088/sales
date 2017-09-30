<?php if ($this->session->userdata('user_id') && !isset($register_hf)) { ?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li><a href="tel:+440 12344678"><i class="fa fa-phone" aria-hidden="true"></i> +440 12344678</a>
                    </li>
                    <li><a href="mailto:info@example.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                            info@example.com</a></li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> Mon - Sat: 07:00 - 19:00</li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                    <ul class="sing">
                        <li><a href="<?=  base_url('auth/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/images/logo-main.png" width="116" height="89"
                                                          alt="ARTzbites" title="ARTzbites"></a>
                </div>
            </div>
        </div>
        </div>
    </nav>
</header>
<?php }?>