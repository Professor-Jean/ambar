<?php

	class Sugestions_model extends MY_Model {

		function __construct() {
			parent::__construct();
		}

		function list_entries(){
      //encontrando o cliente
      $client = $this->model->findClientId($_SESSION['id']);
      //buscar client_equipment com inner join no equipment do cliente ativo
      $this->db->select('client_equipment.name AS unit_name, client_equipment.power AS unit_power, client_equipment.use_time AS unit_use_time, equipment.name AS equip_name, equipment.power, equipment.use_time, equipment.sug_time_1, equipment.sug_time_2, equipment.sug_time_3, equipment.sug_time_4, equipment.sug_power_1, equipment.sug_power_2, equipment.sug_power_3, equipment.normal_time_1, equipment.normal_time_2, equipment.normal_time_3, equipment.normal_power_1, equipment.normal_power_2');
      $this->db->from('client_equipment');
      $this->db->join('equipment', 'client_equipment.equipment_id = equipment.id');
      $this->db->where('clients_id', $client);
      $query_consumption = $this->db->get();
			//$query_equipment = $this->db->get('client_equipment');
			return $query_consumption->result();
		}

		function findClientId($userId){
      $query = $this->db->get_where('clients', array('users_id' => $userId));
      foreach ($query->result() as $row)
      {
        $clientId = $row->id;
      }
      return $clientId;
		}
	}
