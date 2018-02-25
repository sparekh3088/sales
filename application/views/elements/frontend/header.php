<?php if ($this->session->userdata('id')) { ?>
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a class="navbar-brand" href="#">Sales</a>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                    <ul class="sing list-unstyled list-inline">
                        <li><a href="<?=  base_url('profile')?>"><i class="fa fa-user" aria-hidden="true"></i>  <?= $this->session->userdata('full_name') ?></a></li>
                        <li><a href="<?=  base_url('auth/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<?php }?>