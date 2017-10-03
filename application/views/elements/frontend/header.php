<?php if ($this->session->userdata('user_id') && !isset($register_hf)) { ?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-right">
                    <ul class="sing">
                        <li><a href="<?=  base_url('auth/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<header>
    <!-- <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/images/logo-main.png" width="116" height="89"
                                                          alt="ARTzbites" title="ARTzbites"></a>
                </div>
            </div>
        </div>
        </div>
    </nav> -->
</header>
<?php }?>