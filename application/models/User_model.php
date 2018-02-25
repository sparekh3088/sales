<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of package
 *
 * @author Sohil
 */

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function addUser($data) {
        $data["password"] = sha1($this->config->item('PASSWORD_HASH') . $data["password"]);
        if (!isset($data['status']))
            $data['status'] = $this->getStatus();
        else
            $data['status'] = $this->getStatus($data['status']);
        $this->db->insert(Table::USERS, $data);
        $userId = $this->db->insert_id();
        return $userId;
    }

    function addUserRoles($data) {
        $this->db->insert(Table::USERROLES, $data);
        return $this->db->insert_id();
    }

    function updateUser($data, $userId) {
        if (isset($data['status']))
            $data['status'] = $this->getStatus();
        $this->db->where("id", $userId);
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

    function getUsers($condition, $select = "*") {
        $user = $this->db->select($select, false)
                ->from(Table::USERS)
                ->where($condition)
                ->get()
                ->result_array();
        if ($user && count($user) > 0)
            return $user;
        else
            return false;
    }

    function getUserByRole($condition, $select = "*") {
        $user = $this->db->select($select, false)
                ->from(Table::USERS . ' u ')
                ->join(Table::USERROLES . ' ur ', 'ur.userId = u.id', 'INNER')
                ->where($condition)
                ->get()
                ->result_array();
        if ($user && count($user) > 0)
            return $user;
        else
            return false;
    }

    function getUserByRoleFirm($where, $select = "*") {
        $condition = array();
        if( $where['roleId'] ) {
            $condition['ur.roleId'] = $where['roleId'];
        }

        if( $where['userId'] ) {
            $condition['u.id'] = $where['userId'];
        }

        $user = $this->db->select($select, false)
                ->from(Table::USERS . ' u ')
                ->join(Table::USERROLES . ' ur ', 'ur.userId = u.id', 'INNER')
                ->where($condition)
                ->get()
                ->result_array();
        if ($user && count($user) > 0)
            return $user;
        else
            return false;
    }

    function getUserById($userId) {
        $condition = array(
            "id" => $userId,
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

    function getUserRoles($userId) {
        $condition = array(
            "userId" => $userId
        );
        $result = $this->db->select("roleId")
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

    function resetPassword($userId, $newPassword = null) {
        if (!$newPassword)
            return false;
        $newPassword = sha1($this->config->item('PASSWORD_HASH') . $newPassword);
        $data['password'] = $newPassword;
        $this->updateUser($data, $userId);
    }


    function registerUser($data) {
        $insertData = array(
            "email" => $data["email"],
            "name" => $data["name"],
            "password" => $data["password"]
        );
        $userId = $this->addUser($insertData);
        $this->addUserRoles(array(
            "userId" => $userId,
            "roleId" => $data["roleId"]
        ));
        return $userId;
    }

}
