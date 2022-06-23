<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {


public function index()
    {
        
    }

    public function cust()
    {
        $field = "ID";
        $delq = $this->input->post("del");
        $table = 'customers';
        $this->M_cust->delete($table,$field,$delq);
        redirect('control');
    }

    public function menu()
    {
        $field = "ID";
        $delq = $this->input->post("del");
        $table = 'menu';
        $this->M_menu->delete($table,$field,$delq);
        redirect('menu');
    }

    public function category()
    {
        $field = "ID";
        $delq = $this->input->post("del");
        $table = 'kategori';
        $this->M_menu->delete($table,$field,$delq);
        redirect('menu/modifyCategory');
    }
}
