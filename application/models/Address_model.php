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

    function addAddress($data) {
        $this->db->insert(Table::ADDRESS, $data);
        $address_id = $this->db->insert_id();
        return $address_id;
    }

    function updateAddress($data, $addressId) {
        $this->db->where("id", $addressId);
        $this->db->update(Table::ADDRESS, $data);
        return $this->db->affected_rows();
    }

    function getAddress($condition, $select = "*") {
        $address = $this->db->select($select, false)
                ->from(Table::ADDRESS)
                ->where($condition)
                ->get()
                ->result_array();
        if ($address && count($address) > 0)
            return $address[0];
        else
            return false;
    }

}
