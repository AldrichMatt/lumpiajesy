<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

class M_cust extends CI_Model {

    public function get_cust_data()
    {
        $this->db->where('user_role', '0');
        return $this->db->get('customers')->result_array();
    }

    public function result_count()
    {
        $this->db->select('Id');
        return $this->db->get('customers')->result_array();
    }
    
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function search($table, $field, $target)
    {
        $query = "SELECT * FROM $table WHERE $field LIKE '%$target%'; ";
        return $this->db->query($query)->result_array();
    }

    public function update($table, $nama, $alamat, $telepon, $id)
    {
        $query = "UPDATE $table SET Nama = '$nama', Telepon = '$telepon' WHERE id = $id";
        $this->db->query($query);
    }

    public function delete($table, $field, $delq)
    {
        $query = "DELETE FROM $table WHERE $field = $delq; ";
        $this->db->query($query);
    }
}