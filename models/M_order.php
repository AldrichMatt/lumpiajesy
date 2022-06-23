<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

defined('BASEPATH') OR exit('No direct script access allowed');   

class M_order extends CI_Model {
    public function get_order_data_unfinished()
    {   $query = "SELECT * FROM orderan WHERE status = 0 ORDER BY pengambilan ASC";
        return $this->db->query($query)->result_array();
    }
    public function get_order_data_finished()
    {
        return $this->db->get_where('orderan','status = 1')->result_array();
    }
    public function insert_order($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function hapus_order($table, $where)
    {
        $this->db->where('id', $where);
        $this->db->delete($table);
    }
    public function finish_order($table, $key)
    {
        $query = "UPDATE $table SET status = 1 WHERE id = $key";
        $this->db->query($query);
    }
    public function truncate($table)
    {
        $query = "DELETE FROM $table WHERE status = 1";
        $this->db->query($query);
    }
    public function translate_ind($string)
    {
        $base = strtoupper($string);
        $data = [
            'MONDAY' => 'Senin',
            'TUESDAY' => 'Selasa',
            'WEDNESDAY' => 'Rabu',
            'THURSDAY' => 'Kamis',
            'FRIDAY' => 'Jumat',
            'SATURDAY' => 'Sabtu',
            'SUNDAY' => 'Minggu',
            'JANUARY' => 'Januari',
            'JAN' => 'Januari',
            'FEBRUARY' => 'Februari',
            'FEB' => 'Februari',
            'MARCH' => 'Maret',
            'MAR' => 'Maret',
            'APRIL' => 'April',
            'APR' => 'April',
            'MAY' => 'Mei',
            'JUNE' => 'Juni',
            'JUN' => 'Juni',
            'JULY' => 'Juli',
            'JUL' => 'Juli',
            'AUGUST' => 'Agustus',
            'AUG' => 'Agustus',
            'SEPTEMBER' => 'September',
            'SEP' => 'September',
            'OCTOBER' => 'Oktober',
            'OCT' => 'Oktober',
            'NOVEMBER' => 'November',
            'NOV' => 'November',
            'DECEMBER' => 'Desember',
            'DEC' => 'Desember',
        ];
        
        return $data[$base];
    }
}