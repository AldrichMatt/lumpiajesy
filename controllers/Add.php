<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
    
    }   

    public function cust()
    {
        $data = [

            'Nama' => $this->input->post('Nama'),
            'Telepon' => $this->input->post("Telepon")
        ];
        $this->M_cust->insert('customers', $data);
        echo json_encode($data);
        redirect('control');
    }

    public function newcust()
    {
        
        $data = [

            'Nama' => $this->input->post('Nama'),
            'Telepon' => $this->input->post("Telepon")
        ];

        $this->M_cust->insert('customers', $data);
        
        echo json_encode($data);
    }

    public function menu()
    {
        $data = [

            'nama_menu' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'kategori' => $this->input->post('kategori')
        ];
        $this->M_menu->insert('menu', $data);

        redirect('menu');
    }

    public function category()
    {
        if ($this->input->post() !== false)
        {

            $data = ['nama_kategori' => $this->input->post('kategori')];
            
            if ($this->M_menu->search_category($data) !== false){
            } else {
                $this->M_menu->insert_category('kategori', $data);
                echo json_encode($data);
            }
        }
        
    }
    public function kategori()
    {

            $data = ['nama_kategori' => $this->input->post('kategori')];
            
            if ($this->M_menu->search_category($data) !== false){
                
            } else {
                $this->M_menu->insert_category('kategori', $data);
            }
            redirect('menu/modifyCategory');
        
    }

    public function order()
    {
        $data = [
        'nama_cust' => $this->input->post('nama_cust'),
        'menu' => $this->input->post('menu'), 
        'harga'=> $this->input->post('total_harga'), 
        'pengambilan' => $this->input->post('pengambilan'),
        'status' => 0];

        $this->M_order->insert_order('orderan', $data);
        redirect('order');
    }
}