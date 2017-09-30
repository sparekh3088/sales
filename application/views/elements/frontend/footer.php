<?php if ($this->session->userdata('user_id') && !isset($register_hf)) { ?>
    <section class="footer-panel">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">All rights Reserved.</div>
                <div class="col-sm-6 col-xs-12 text-right">
                    <div class="social-icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="footer-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2017 Forever Guest Book, All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="text-right">
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>