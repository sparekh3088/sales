<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of package
 *
 * @author Sohil
 */

class Address_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function addCountry($countryName) {
        
    }

    function addUser($data) {
        $data["password"] = sha1($this->config->item('PASSWORD_HASH') . $data["password"]);
        if (!isset($data['status']))
            $data['status'] = $this->getStatus();
        else
            $data['status'] = $this->getStatus($data['status']);
        $this->db->insert(Table::USERS, $data);
        $user_id = $this->db->insert_id();
        return $user_id;
    }

    function addUserRoles($data) {
        $this->db->insert(Table::USERROLES, $data);
        return $this->db->insert_id();
    }

    function updateUser($data, $userId) {
        if (isset($data['status']))
            $data['status'] = $this->getStatus();
        $this->db->where("user_id", $userId);
        $this->db->update(Table::USERS, $data);
        return $this->db->affected_rows();
    }

    function getUser($condition, $select = "*") {
        $user = $this->db->select($select, false)
                ->from(Table::USERS)
                ->where($condition)
                ->get()
                ->result_array();
        if ($user && count($user) > 0)
            return $user[0];
        else
            return false;
    }

    function getUserById($userId) {
        $condition = array(
            "user_id" => $userId,
            "status" => $this->getStatus()
        );
        return $this->getUser($condition);
    }

    function getUserByEmail($email) {
        $condition = array(
            "email" => $email,
            "status" => $this->getStatus()
        );
        return $this->getUser($condition);
    }

    function existsUserEmail($email) {
        $condition = array(
            "email" => $email,
            "status" => $this->getStatus()
        );
        $result = $this->getUser($condition, "email");
        return (isset($result) && $result && count($result) > 0);
    }

    function getUserRoles($user_id) {
        $condition = array(
            "user_id" => $user_id
        );
        $result = $this->db->select("role_id")
                ->from(Table::USERROLES)
                ->where($condition)
                ->get()
                ->result_array();
        return $result;
    }

    function getStatus($status = "ENABLE") {
        $statuses = array(
            "ENABLE" => "ENABLE",
            "DISABLE" => "DISABLE",
            "INAPPROPRIATE" => "INAPPROPRIATE"
        );
        if (isset($status) && !isset($statuses[$status]))
            $status = "ENABLE";
        return $statuses[$status];
    }

    function resetPassword($user_id, $newPassword = null) {
        if (!$newPassword)
            return false;
        $newPassword = sha1($this->config->item('PASSWORD_HASH') . $newPassword);
        $data['password'] = $newPassword;
        $this->updateUser($data, $user_id);
    }


    function registerUser($data) {
        $insertData = array(
            "email" => $data["email"],
            "name" => $data["name"],
            "contact" => $data["contact"],
            "password" => $data["password"]
        );
        $user_id = $this->addUser($insertData);
        $this->addUserRoles(array(
            "user_id" => $user_id,
            "role_id" => $data["role_id"]
        ));
        return $user_id;
    }

}
