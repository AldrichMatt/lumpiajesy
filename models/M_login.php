<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

class M_login extends CI_Model {

    public function login_verification($telepon)
    {
        return $this->db->get_where('customers', ['Telepon' => $telepon])->row_array();
    }

}