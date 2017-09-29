<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
    }

    public function index($page = 1) {
		$users = $this->User_model->getUsers(array());
		$this->load->view('welcome_message', array(
			"users" => $users
		));
    }

    public function addUser() {
    	$this->load->model('User_model');
        $userData = array(
        	"name" => "Sohil Parekh",
        	"email" => "sohilparekh89@gmail.com",
        	"password" => "123456"
        );
        $userRole = array(
        	"userId" => $this->User_model->addUser($userData),
        	"roleId" => 1
        );
        $this->User_model->addUserRoles($userRole);
    }
}
