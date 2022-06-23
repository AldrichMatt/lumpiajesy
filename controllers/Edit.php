<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function index()
    {
        $this->load->view('dashboard');
    }
    
    public function cust()
    {
        $data['table'] = $this->input->post('table');
        $data['id'] = $this->input->post('id');
        $data['Nama'] = $this->input->post('Nama');
        $data['Alamat'] = $this->input->post('Alamat');
            $data['Telepon'] = $this->input->post('Telepon');
            
            $this->load->view('edit_cust',$data);
        }     
        
        public function menu()
        {
        $data['cat'] = $this->M_menu->get_category_data();
            $data['table'] = $this->input->post('table');
            $data['id'] = $this->input->post('id');
            $data['Nama'] = $this->input->post('Nama');
            $data['Harga'] = $this->input->post('Harga');
            $data['kategori'] = $this->input->post('kategori');
            
        $this->load->view('edit_menu',$data);
        }

        public function category()
        {
            $data['Nama'] = $this->input->post('Nama');
            $data['id'] = $this->input->post('id');

            $this->load->view('edit_category', $data);
        }

    public function update()
    {
        $table = $this->input->post('table');


        switch ($table) {
            case 'customers':
        $nama = $this->input->post('Nama');
        $alamat = $this->input->post('Alamat');
        $telepon = $this->input->post('Telepon');
        $id = $this->input->post('id');


        $this->M_cust->update($table, $nama, $alamat, $telepon, $id);
        redirect('control');
                break;

            case 'menu':
                $nama = $this->input->post('Nama');
                $harga = $this->input->post('Harga');
                $id = $this->input->post('id');
                $kategori = $this->input->post('kategori');

        $this->M_menu->update($table, $nama, $harga, $id, $kategori);
        redirect('menu');
                break;

            case 'kategori':
                $nama = $this->input->post('Nama');
                $id = $this->input->post('id');

        $this->M_menu->updateCategory($table, $nama, $id);
        redirect('menu/modifyCategory');
                break;
        }
        
    }


    
}
