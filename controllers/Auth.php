<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    
    public function index()
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim', [
            'required' => 'Kamu belum masukin nama kamu',
        ]);
        $this->form_validation->set_rules('telepon','Telepon', 'required|trim', [
            'required' => 'Kamu belum masukin nomor kamu'
        ]);
        
        if($this->form_validation->run() !== true){
            $this->load->view('login');
            
        } else {
            $this->_login();
        }
    }

    public function error_404()
    {
        $this->load->view('error_404');
    }
    public function error_403()
    {
        $this->load->view('error_403');
    }
    
    private function _login()
    {
    $nama = $this->input->post('nama');
    $telepon = $this->input->post('telepon');
    
    $user = $this->M_login->login_verification($telepon);

    if($user){
        if($user['Nama'] == $nama && $user['Telepon'] == $telepon)
        {   
            $data = [
                'nama' => $user['Nama'],
                'telepon' => $user['Telepon'],
                'role' => $user['user_role']
            ];
            $this->session->set_userdata($data);
            switch ($user['user_role']) {
                case '0':
                    redirect('User');
                    break;
                case '1':
                    redirect('Control');
                    break;
                // case '2':
                //     redirect('User');
                //     break;
                
                default:
                    redirect('User');
                    
                    break;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Informasi yang dimasukkan salah, mohon periksa lagi</div>');
            redirect('Auth');
        }
    }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User ini belum ada, registrasi terlebih dahulu </div>');
        redirect('auth');
    }

    

    }

    public function registration()
    {  
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kamu belum masukin nama kamu',
            
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|is_unique[customers.Telepon]|max_length[13]', [
            'is_unique' => 'Nomor ini sudah terdaftar, coba periksa lagi',
            'required' => 'Kamu belum masukin nomor kamu'
        ]);

        if($this->form_validation->run() !== true)
        {
            $this->load->view('registration');
            
        } else {
            $nama = $this->input->post('nama');
            $telepon = $this->input->post('telepon');
            $data = [
            'Nama' => $nama,
            'Telepon' => $telepon,
            'user_role' => 0,
            ];
            $this->M_cust->insert('customers', $data);

            redirect('Control');
        }
    }
}
