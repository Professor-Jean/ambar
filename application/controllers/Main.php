<?php
class Main extends MY_Controller{

  function __construct(){
    parent::__construct();
    // Carrega o modelo
    $this->load->model('Main_model', 'model', TRUE);
  }

  public function index(){
    $this->template->load('main_view', 'main_initial');
  }
  
}
