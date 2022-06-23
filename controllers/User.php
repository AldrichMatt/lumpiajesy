<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index(){
        $data['user'] = $this->M_login->login_verification($this->session->userdata('telepon'));
        $this->load->view('user/dashboard');
    }
}
