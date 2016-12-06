<?php

class Reg_Admin_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        return $this->db->insert('users', $data);
    }

    function list_entries(){
        $query = $this->db->get_where('users', array('permission' => 0));
        return $query->result();
    }

    function userUpdate($data){
        $query = $this->db->get_where('users', array('id' => $data));
        return $query->result();
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return  $this->db->update('users', $data);
    }

    function delete($id){
      $this->db->where('id', $id);
      return $this->db->delete('users');
    }
}
