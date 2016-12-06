<?php

	class Client_Equipment_model extends MY_Model {

		function __construct() {
			parent::__construct();
		}

		function insert($data) {
			return $this->db->insert('client_equipment', $data);
		}

		function update($id, $data){
				$this->db->where('id', $id);
				return  $this->db->update('client_equipment', $data);
		}

		function list_entries(){
			$query_equipment = $this->db->get('client_equipment');
			return $query_equipment->result();
		}

		function findClient($userId){
      $query = $this->db->get_where('clients', array('users_id' => $userId));
      return $query->result();
		}

		function productUpdate($productId){
      $query = $this->db->get_where('client_equipment', array('id' => $productId));
      return $query->result();
		}

		function delete($id){
			$this->db->where('id', $id);
			return $this->db->delete('client_equipment');
		}

		function findSugestion($id){
      $query = $this->db->get_where('equipment', array('id' => $id));
			return $query->result();
		}
		function shared($id){
      $query = $this->db->get_where('equipment', array('id' => $id));
			return $query->result();
		}

	}
