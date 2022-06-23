<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function __construct()
    {
        parent :: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
     
    public function index(){

        $data['orderan'] = $this->M_order->get_order_data_unfinished();


        $this->load->view('order', $data);
    }

    public function new(){
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|is_unique[customers.Telepon]|max_length[13]', [
            'is_unique' => 'Nomor ini sudah terdaftar, coba periksa lagi',
            'required' => 'Kamu belum masukin nomor kamu'
        ]);
        $data['cust'] = $this->M_cust->get_cust_data();
        $data['kategori'] = $this->M_menu->get_category_data();
        $data['menu'] = $this->M_menu->get_menu_data();
        $this->load->view('new_order',$data);
    }

    public function history(){
        $data['orderan'] = $this->M_order->get_order_data_finished();
        $this->load->view('history_order', $data);
    }

    public function onchange(){
        $kategori = $this->input->get('kategori');

        $data['kategori_array']= $this->M_menu->get_selected_category($kategori);        
        echo json_encode($data);
    }

    public function temp(){
        $menu = $this->input->post('Menu');
        $jumlah = $this->input->post('Jumlah');
        $harga = $this->M_menu->get_menu_price($menu);
        $hargamenu = $harga[0]['harga'];
        $orderan = $this->input->post('rincianOrder');

        $kalkulasi = intval($jumlah) * intval($hargamenu);

        $data = [
            'kategori' => $this->input->post('Kategori'),
            'menu' => $this->input->post('Menu'),
            'jumlah' => $this->input->post('Jumlah'),
            'harga' => $kalkulasi,
            'orderan' => $orderan
        ];
        
        echo json_encode($data);
    }

    public function search(){
        $searchkey = $this->input->post('searchkey');
        $table = 'customers';
        $field = 'Nama';
        $searchres = $this->M_cust->search($table, $field, $searchkey);

        echo json_encode($searchres);
    }

    public function delete(){
        $where = $this->input->post('cancel');
        $page = $this->input->post('page');
        $this->M_order->hapus_order('orderan',$where);
        
        redirect($page);
    }

    public function selesaikan()
    {
        $key = $this->input->post('key');
        $this->M_order->finish_order('orderan', $key);

        redirect('order');
    }

    public function truncate()
    {
        $this->M_order->truncate('orderan');

        redirect('order/history');
    }
}
