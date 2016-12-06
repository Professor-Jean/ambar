<?php

class Reg_Room_model extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function insert($data) {
		return $this->db->insert('room', $data);
	}
	
	function list_entries() {
		$query = $this->db->get('room');
		return $query->result();
	}
	
	function getRoom($id) {
		$query = $this->db->get_where('client_equipment', array('room_id'=>$id));
		return COUNT($query->result());
	}
	
	function roomUpdate($id){
		$query = $this->db->get_where('room', array('id'=>$id));
		return $query->result();
	}
	
	function Update($id, $data){
		$this->db->where('id', $id);
		return  $this->db->update('room', $data);
	}
	
	function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('room');
	}
}