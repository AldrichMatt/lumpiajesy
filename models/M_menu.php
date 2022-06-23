<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

class M_menu extends CI_Model {

    public function get_menu_data()
    {
        return $this->db->get('menu')->result_array();
    }

    public function get_category_data()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function result_count()
    {
        $this->db->select('Id');
        return $this->db->get('customers')->result_array();
    }
    public function search($table, $field, $target)
    {
        $query = "SELECT * FROM $table WHERE $field LIKE '%$target%'; ";
        return $this->db->query($query)->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function insert_category($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $nama, $harga, $id, $kategori)
    {
        $query = "UPDATE $table SET nama_menu = '$nama', harga = '$harga', kategori = '$kategori' WHERE id = $id";
        $this->db->query($query);
    }

    public function updateCategory($table, $nama, $id)
    {
        $query = "UPDATE $table SET nama_kategori = '$nama' WHERE id = $id";
        $this->db->query($query);
    }

    public function search_category($key)
    {
        $this->db->where($key); 
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0){
        return true;
        }
        else{
        return false;
    }
    }

    public function delete($table, $field, $delq)
    {
        $query = "DELETE FROM $table WHERE $field = '$delq'; ";
        $this->db->query($query);
    }

    public function delete_category($table, $field, $delq)
    {
        $query = "DELETE FROM $table WHERE $field = '$delq'; ";
        $this->db->query($query);
    }

    public function get_selected_category($kategori)
    {
        $query = "SELECT nama_menu FROM menu WHERE kategori='$kategori';";
        return $this->db->query($query)->result_array();
    }

    public function get_menu_price($menu)
    {
        $query = "SELECT harga FROM menu WHERE nama_menu='$menu'";
        return $this->db->query($query)->result_array();
    }
}
