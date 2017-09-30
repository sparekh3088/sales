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
        if ($this->session->userdata('user_id')) {
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
                $this->loginData($userDetails["user_id"]);
                redirect('user/dashboard');
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
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone1', 'Phone Number', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validation error
            return $this->signup();
        }

        //$name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $email = addslashes($email);
        //$name = addslashes($name);
        $password = addslashes($password);
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $phone = $this->input->post('phone1');

        if (!empty($email) && !empty($password)) {
            $data = array(
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone1' => $phone,
                'username' => $email,
                'password' => $password
            );

            $this->load->model('User_model');
            $uModel = new User_model();
            if (!$uModel->existsUserEmail($email)) {
                $uModel = new User_model();
                $user_id = $uModel->addUser($data);

                if ($user_id) {
                    $uModel->addClient($data, $user_id);
                    $roledata = array('role_id' => 3,
                        'user_id' => $user_id);
                    $uModel->addUserRoles($roledata);

                    $this->load->model("Merchant_model");
                    $merchantData = array(
                        "first_name" => $data["first_name"],
                        "last_name" => $data["last_name"],
                        "email" => $data["email"],
                        "user_id" => $user_id
                    );
                    $merchant_account_id = $this->Merchant_model->addMerchant($merchantData);
                    $merchantUser = array(
                        "merchant_account_id" => $merchant_account_id,
                        "user_id" => $user_id,
                        "is_default" => 1
                    );
                    $this->Merchant_model->addUserMerchant($merchantUser);

                    /* $this->load->model('Send_mail_model');
                      $sMail = new Send_mail_model();
                      $sMail->sendRegister($email); */
                    $this->loginData($user_id);
                    if ($this->session->role_id == 1)
                        redirect('admin/dashboard');
                    else if ($this->session->role_id == 2)
                        redirect('admin/hoster/dashboard');
                    else
                        redirect('user/register');
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
            /* $password = $this->getNewPassword($email);
              $uModel->resetPassword($user['id'], $password);
              $this->load->model('Send_mail_model');
              $sMail = new Send_mail_model();
              $sMail->sendPasswordReset($email, $password); */
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

    private function loginData($user_id, $additional = null) {
        $this->load->model('User_model');
        $uModel = new User_model();
        $userData = $uModel->getUserById($user_id);
        $userRoles = $uModel->getUserRoles($user_id);
        $roles = array_map(function($value) {
            return $value["role_id"];
        }, $userRoles);
        $this->session->set_userdata($userData);
        $this->session->set_userdata("full_name", $userData['first_name'] . " " . $userData['last_name']);
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
