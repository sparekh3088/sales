<section>
    <div class="container">
        <div class="panel-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-panle-logo">
                        <img src="<?=  base_url('assets')?>/images/logo-main.png" class="img-responsive">
                        <h2>Start Your <b>Registry</b></h2>
                    </div>
                    <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                            <?php } ?>
                    <form method="POST">
                        <label for="first-name">Your Info</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First Name" value="<?=set_value('first_name',@$data['first_name'])?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Last Name" value="<?=set_value('last_name',@$data['last_name'])?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-form" <?=(set_value('me')=='bride' || (@$data['me']=='bride'))?'active':''?>>
                                            <input type="radio" name="me" value="bride" id="option2" <?=set_radio('me','bride',(@$data['me']=='bride'))?> autocomplete="off"> Bride
                                        </label>
                                        <label class="btn btn-form <?=(set_value('me')=='groom' || (@$data['me']=='groom'))?'active':''?>">
                                            <input type="radio" name="me" value="groom" id="option3" <?php echo set_radio('me','groom',(@$data['me']=='groom'))?> autocomplete="off"> Groom
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="p-first-name">Your Partner</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="partner_first_name" class="form-control" id="p-first-name" placeholder="First Name" value="<?=set_value('partner_first_name',@$data['partner_first_name'])?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="partner_last_name" class="form-control" id="p-last-name" placeholder="Last Name" value="<?=set_value('partner_last_name',@$data['partner_last_name'])?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-form <?=(set_value('partner')=='bride' || (@$data['partner']=='bride'))?'active':''?>">
                                            <input type="radio" value="bride" name="partner" <?php echo set_radio('partner','bride',(@$data['partner']=='bride'))?> id="option2" autocomplete="off"> Bride
                                        </label>
                                        <label class="btn btn-form <?=(set_value('partner')=='groom' || (@$data['partner']=='groom'))?'active':''?>">
                                            <input type="radio" value="groom" name="partner" <?php echo set_radio('partner','groom',(@$data['partner']=='groom'))?> id="option3" autocomplete="off"> Groom
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="partner_email" class="form-control" id="partner-email"  placeholder="Partner Email ( Optional )" value="<?=set_value('partner_email',@$data['partner_email'])?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="partner-email" style="padding-top: 13px">Invite your partner to manage your
                                    registry together.</label>
                            </div>
                        </div>
                        <label for="basic-url">Your Partner</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"
                                          id="basic-addon3">forveverguestbook.com/registry</span>
                                    <input name="partner_registry" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=set_value('partner_registry',@$data['partner_registry'])?>">
                                </div>
                            </div>
                        </div>
                        <label for="date">WEDDING DATE</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="wedding_date" type="date" class="form-control" id="date" aria-describedby="basic-addon3" placeholder="mm/dd/yy" value="<?=set_value('wedding_date',@$data['wedding_date'])?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="padding-top: 8px">
                                    <input type="checkbox" tabindex="3" class="" name="notpicked" id="remember">
                                    <label for="remember">We haven't picked a date yet</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-4">
                                <button type="submit" class="btn btn-login">Create Registery</button>
                                <br>
                                <div class="skip-link">
                                    <a href="<?=  base_url('user/dashboard')?>">Skip, I'll do it later...</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>