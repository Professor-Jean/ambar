<?php

class Initial_model extends MY_Model {

  function __construct() {
      parent::__construct();
  }

  function insert($data_user, $data_client) {
    if ($this->db->insert('users', $data_user)){
      $data_client['users_id'] = $this->db->insert_id();
      $this->db->insert('clients', $data_client);
      return $data_client['users_id'];
    }
    return false;
  }

  function login($data){
    $query = $this->db->get_where('users', array('user' => $data['user'], 'password' => $data['password']));
    return $query->result();
  }
}
