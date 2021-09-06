<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_account extends CI_Model
{
  public function __construct() {
        parent::__construct();
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('customer_details', array('customer_id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('customer_details', array('email_address' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }



    public function updatePassword($id, $data)
    {
        $this->db->where('customer_id', $id);
        $this->db->update('customer_details', $data);
        return true;
    }
    //End: method tambahan untuk reset code  
}