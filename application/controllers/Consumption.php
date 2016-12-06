<?php
class Consumption extends MY_Controller {

	function __construct() {
		parent::__construct();
		// Carrega o modelo
		$this->load->model('Consumption_model', 'model', TRUE);
	}

	public function index() {
		$data['equipments'] = $this->model->list_entries($_SESSION['id']);
		$this->template->load('main_view', 'consumption/view_consumption', $data);
	}
}
