<?php
class Reg_Equipment_model extends MY_Model {

	function __construct() {
			parent::__construct();
	}

	function insert($data) {
			return $this->db->insert('equipment', $data);
	}

	function list_entries(){
			$query = $this->db->get('equipment');
			return $query->result();
	}
	
	function getEquipment($data){
		$query = $this->db->get_where('equipment', array('id' => $data));
		return $query->result();
	}
    
	function update($id, $data){
			$this->db->where('id', $id);
			return $this->db->update('equipment', $data);
	}

	function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('equipment');
	}
	
	function checkDependency($id){
		$query = $this->db->get_where('client_equipment', array('equipment_id' => $id));
		return !count($query->result());
	}
	
}
