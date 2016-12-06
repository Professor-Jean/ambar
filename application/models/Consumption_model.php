<?php

class Consumption_model extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	function list_entries($id){
		$query_equipment = $this->db->query("SELECT client_equipment.*, equipment.name AS equipamento, equipment.consumption_type, room.name AS comodo FROM client_equipment INNER JOIN equipment ON client_equipment.equipment_id=equipment.id INNER JOIN room ON client_equipment.room_id=room.id INNER JOIN clients ON client_equipment.clients_id=clients.id WHERE clients.users_id='".$id."' ORDER BY room.name, equipment.name, client_equipment.name");
		return $query_equipment->result();
	}
}
