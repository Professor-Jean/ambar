<?php
class Client_Equipment extends MY_Controller{

	function __construct(){
		parent::__construct();
		// Carrega o modelo
		$this->load->model('Client_Equipment_model', 'model', TRUE);
	}

	public function index(){
		$this->template->load('main_view', 'client_equipment/view_client_equipment');
	}

	public function formIns(){
		$this->template->load('main_view', 'client_equipment/fmins_client_equipment');
	}

	public function update($id = NULL){
		if(isset($id)){
			$data['productUpdate'] = $this->model->productUpdate($id);
			$this->template->load('main_view', 'client_equipment/fmupd_client_equipment', $data);
		}else{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			// Define regras de validação
			$val_rules = array(
				array(
					'field' => 'sel_type',
					'label' => 'Tipo',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_name',
					'label' => 'Nome',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'sel_room',
					'label' => 'Cômodo',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_npeople',
					'label' => 'Nº de Pessoas',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_power',
					'label' => 'Potência',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_time',
					'label' => 'Tempo de uso',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'sel_format',
					'label' => 'H/S/M',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($val_rules);
			// Validando
			if($this->form_validation->run() == false){
        $this->session->set_flashdata('controller_message', '<div class="message danger">Preencha o formulário corretamente!</div>');
				$this->update($this->input->post('id'));
			} else {
				$client = $this->model->findClient($_SESSION['id']);

				$hour = self::calcUseTime($this->input->post('txt_time'), $this->input->post('sel_format'));

				$data['equipment_id']     = $this->input->post('sel_type');
				$data['clients_id']       = $client[0]->id;
				$data['room_id']       		= $this->input->post('sel_room');
				$data['name']       			= $this->input->post('txt_name');
				$data['power']       			= $this->input->post('txt_power');
				$data['number_of_people'] = $this->input->post('txt_npeople');
				$data['use_time']       	= $hour;
				// Insere o usuário no BD
				if ($this->model->update($this->input->post('id'), $data)){
	        $this->session->set_flashdata('controller_message', '<div class="message success">Produto alterado com sucesso!</div>');
					redirect('Client_Equipment');
				} else {
					$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao alterar o equipamento.</div>');
					log_message('error', 'Erro ao alterar o equipamento.');
				}
			}
		}

	}

	public function cloneEquip($id){
		if(isset($id)){
			$data['productUpdate'] = $this->model->productUpdate($id);
			$this->template->load('main_view', 'client_equipment/clone_client_equipment', $data);
		}
	}

	public function register(){
		// Carrega a biblioteca de validação de formulários e seta elemento de erros
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		// Define regras de validação
		$val_rules = array(
			array(
				'field' => 'sel_type',
				'label' => 'Tipo',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'txt_name',
				'label' => 'Nome',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'sel_room',
				'label' => 'Cômodo',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'txt_npeople',
				'label' => 'Nº de Pessoas',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'txt_power',
				'label' => 'Potência',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'txt_time',
				'label' => 'Tempo de uso',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'sel_format',
				'label' => 'H/S/M',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($val_rules);
		// Validando
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('controller_message', '<div class="message danger">Preencha o formulário corretamente!</div>');
			$this->formIns();
		} else {

			$client = $this->model->findClient($_SESSION['id']);

			$hour = self::calcUseTime($this->input->post('txt_time'), $this->input->post('sel_format'));

			$data['equipment_id']     = $this->input->post('sel_type');
			$data['clients_id']       = $client[0]->id;
			$data['room_id']       		= $this->input->post('sel_room');
			$data['name']       			= $this->input->post('txt_name');
			$data['power']       			= $this->input->post('txt_power');
			$data['number_of_people'] = $this->input->post('txt_npeople');
			$data['use_time']       	= $hour;
			// Insere o usuário no BD
			if ($this->model->insert($data)){
        $this->session->set_flashdata('controller_message', '<div class="message success">Produto inserido com sucesso!</div>');
				redirect('Client_Equipment');
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao cadastrar o equipamento.</div>');
				log_message('error', 'Erro ao cadastrar o equipamento.');
			}
		}

	}

	public function delete($id){
		if ($this->model->delete($id)){
			$this->session->set_flashdata('controller_message', '<div class="message success">Produto excluído com sucesso!</div>');
			redirect('Client_Equipment');
		} else {
			$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao excluir o equipamento.</div>');
			log_message('error', 'Erro ao excluir o equipamento do cliente.');
		}
	}

	public function findSugestion(){
		$id = $this->input->post('id');
		$data['equips'] = $this->model->findSugestion($id);
		$this->template->load('ajax', 'client_equipment/sugestion_client_equipment', $data);
	}

	public function shared(){
		$id = $this->input->post('id');
		$data['equips'] = $this->model->shared($id);
		$this->template->load('ajax', 'client_equipment/shared_client_equipment', $data);
	}

	private function calcUseTime($hour, $type){

		if($type!="d"){
			$hour = self::convertToSeconds($hour);
			if($type=="s"){
					$hour = $hour/7;
			}elseif($type=="m"){
					$hour = $hour/30;
			}
			$hour = self::convertToHour($hour);
		}
		return $hour;
	}

	private function convertToSeconds($hour){
		$segments = explode(":", $hour);
		$h = (isset($segments[0]))?$segments[0]:0;
		$m = (isset($segments[1]))?$segments[1]:0;
		$s = (isset($segments[2]))?$segments[2]:0;
		$h_t_m = $h*60;
		$m_t_s = ($m + $h_t_m) *60;
		$seconds = $m_t_s+$s;
		return $seconds;
	}

	private function convertToHour($seconds){

		$h = floor($seconds / 3600);
		$m = floor(($seconds - ($h * 3600)) / 60);
		$s = floor($seconds % 60);

		$fullHour = $h.":".$m.":".$s;

		return $fullHour;
	}
}
