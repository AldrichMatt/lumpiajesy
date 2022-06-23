<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

    public function index()
    {
        $data['target'] = $this->input->get('search');
        $table = 'customers';
        $field = 'Nama';
        $data['user'] = $this->M_login->login_verification($this->session->userdata('telepon'));

        if($data['user']['user_role'] == 1){
            $data['indexres'] = $this->M_cust->result_count(); //counting number of data in table customers
        
        if($data['target'] ==! false){
            $data['result'] = $this->M_cust->search($table, $field, $data['target']);
        }
        else {
            $data['cust'] = $this->M_cust->get_cust_data();
        }

        $this->load->view('dashboard', $data);
        } else {
            redirect('auth/error_403');
        }
                
        
        
    }

    public function delete()
    {
        $table = "customers";
        $field = "Nama";
        
        $delq = $this->input->post("del");

        $this->M_cust->delete($table,$field,$delq);

        redirect("control");        
    }

    
}