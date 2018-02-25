<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Sohil
 */
class Admin extends SL_Controller {

	//put your code here
    public function __construct() {
        parent::__construct();
    }

    public function dashboard() {
    	$data = array(
    		'pageTitle' => "Dashboard",
            "pageSlug" => "/",
            "breadCrumb" => array(
                'Home' => '/'
            )
    	);
    	$this->template->load('eventHome', 'elements/user/dashboard', $data);
    }

}