<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function index()
    {
        $data['target'] = $this->input->get('search');
        $table = 'menu';
        $field = 'nama_menu';
        $data['category'] = $this->M_menu->get_category_data();

        
        
        $data['indexres'] = $this->M_menu->result_count(); //counting number of data in table customers
        
        if($data['target'] ==! false){
            $data['result'] = $this->M_menu->search($table, $field, $data['target']);
        }
        else {
            $data['menu'] = $this->M_menu->get_menu_data();
        }

        $this->load->view('menu', $data);
    }

    public function modifyCategory()
    {

        $data['category'] = $this->M_menu->get_category_data();
        $this->load->view('modifyCategory',$data);
    }
}
