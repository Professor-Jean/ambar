<?php
class Main_client extends MY_Controller{

  function __construct(){
    parent::__construct();
    // Carrega o modelo
    $this->load->model('client_initial_view', 'model', TRUE);
  }

  
}
