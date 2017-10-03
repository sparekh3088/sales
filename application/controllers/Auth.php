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
class Auth extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if ($this->session->userdata('userId')) {
            redirect(site_url() . 'user/dashboard');
        }
        $data = array(
            'pageTitle' => "Login"
        );
        $this->template->load('frontend', 'elements/user/login', $data);
    }

    public function signup() {
        $data = array(
            'pageTitle' => "Sign Up"
        );
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->template->load('frontend', 'elements/user/signUp', $data);
    }

    public function verify() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $email = addslashes($email);
        $password = addslashes($password);

        if (!empty($email) && !empty($password)) {
            $this->load->model('User_model');
            $uModel = new User_model();
            $userDetails = $uModel->getUserByEmail($email);
            $password = sha1($this->config->item('PASSWORD_HASH') . $password);
            if ($userDetails && ( $userDetails['password'] == $password )) {
                $this->loginData($userDetails["id"]);
                redirect('admin/dashboard');
            }
            $this->session->set_flashdata("Error", "Incorrect email address or password");
            redirect("auth/login");
        }
        $this->session->set_flashdata("Error", "Please enter your email address and password");
        redirect("auth/login");
    }

    public function register() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Username', 'trim|required|valid_email|max_length[254]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validation error
            return $this->signup();
        }

        //$name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $email = addslashes($email);
        $password = addslashes($password);
        $name = $this->input->post('name');

        if (!empty($email) && !empty($password)) {
            $data = array(
                'email' => $email,
                'name' => $name,
                'password' => $password
            );

            $this->load->model('User_model');
            $uModel = new User_model();
            if (!$uModel->existsUserEmail($email)) {
                $uModel = new User_model();
                $userId = $uModel->addUser($data);

                if ($userId) {
                    $roledata = array('roleId' => 3,
                        'userId' => $userId);
                    $uModel->addUserRoles($roledata);

                    $this->loginData($userId);
                    redirect('admin/dashboard');
                }
            }
            $this->session->set_flashdata("Error", "<label>" . $email . " already registered. Kindly login to access your account.</label>");
            redirect('auth/login');
        }
        $this->session->set_flashdata("Error", "Please fill all the required fields");
        redirect('auth/login');
    }

    public function reset() {
        $email = $this->input->post('email');
        $email = addslashes($email);
        if (empty($email)) {
            $this->session->set_flashdata("Error", "Please enter valid email id");
            redirect('auth/login');
        }

        $this->load->model('User_model');
        $uModel = new User_model();
        $user = $uModel->getUserByEmail($email);
        if ($user) {
            $this->session->set_flashdata("Success", "Email sent with reset password instructions");
            redirect('auth/login');
        }
        $this->session->set_flashdata("Error", "Email does not exist in our database");
        redirect('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    private function getNewPassword($email) {
        $emailHash = md5($email);
        $password = substr($emailHash, rand(0, 32), 2) . rand(0, 9999) . substr($emailHash, rand(0, 32), 2);
        return $password;
    }

    private function loginData($userId, $additional = null) {
        $this->load->model('User_model');
        $uModel = new User_model();
        $userData = $uModel->getUserById($userId);
        $userRoles = $uModel->getUserRoles($userId);
        $roles = array_map(function($value) {
            return $value["roleId"];
        }, $userRoles);
        $this->session->set_userdata($userData);
        $this->session->set_userdata("full_name", $userData['name']);
        $this->session->set_userdata("roles", $roles);
        if ($additional)
            $this->session->set_userdata($additional);
    }

    public function passwordReset() {
        $data = array(
            'pageTitle' => "Password Reset"
        );
        $this->template->load('frontend', 'elements/user/passwordreset', $data);
    }

}
