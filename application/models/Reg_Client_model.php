<?php

class Reg_Client_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function list_entries(){
        $query = $this->db->get_where('users', array('permission' => 1));
        return $query->result();
    }

    function userUpdate($id){
        $query = $this->db->get_where('users', array('id'=>$id));
        return $query->result();
    }

    function clientUpdate($id){
        $query = $this->db->get_where('clients', array('users_id'=>$id));
        return $query->result();
    }

    function update($id, $data){
      $query_clients = $this->db->query("UPDATE clients SET name='".$data['fullname']."', email='".$data['email']."' WHERE users_id='".$id."'");
      $query_users   = $this->db->query("UPDATE users SET user='".$data['user']."', password='".$data['password']."' WHERE id='".$id."'");

      return true;
    }

    function delete($id){
      $query = $this->db->get_where('clients', array('users_id' => $id));
      $result = $query->result();
      
      $this->db->where('clients_id', $result[0]->id);
      if ($this->db->delete('client_equipment')) {
				$this->db->where('id', $result[0]->id);
				if ($this->db->delete('clients')) {
					$this->db->where('id', $id);
					if ($this->db->delete('users')) {
						return true;
					}
				}
			}
			return false;
    }
}
