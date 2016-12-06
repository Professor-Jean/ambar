<?php
class Reg_Room extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// Carrega o modelo
		$this->load->model('Reg_Room_model', 'model', TRUE);
		
	}
	
	public function index() {
		$data['rooms'] = $this->model->list_entries();
		$this->template->load('main_view', 'room/fmins_room.php', $data);
	}
	
	public function update($id){
		if(isset($id)){
			$data['roomUpdate'] = $this->model->RoomUpdate($id);
			$data['rooms'] = $this->model->list_entries();
			$this->template->load('main_view', 'room/fmins_room', $data);
		}else{
			$data['name'] = $this->input->post('txt_name');
			// Insere o usuário no BD
			if ($this->model->update($this->input->post('id'),$data)){
				$this->session->set_flashdata('controller_message', '<div class="message success">Cômodo alterado com sucesso!</div>');
				redirect('Reg_Room');
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao alterar Cômodo!</div>');
				log_message('error', 'Erro ao alterar o cômodo.');
			}
		}
	}
	
	public function register(){
		// Carrega a biblioteca de validação de formulários e seta elemento de erros
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		// Define regras de validação
		$val_rules = array(
			array(
				'field' => 'txt_name',
				'label' => 'Nome',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($val_rules);
		// Validando
		if($this->form_validation->run() == false){
			$this->index();
		} else {
			$data['name'] = $this->input->post('txt_name');
			// Insere o usuário no BD
			if ($this->model->insert($data)){
				$this->session->set_flashdata('controller_message', '<div class="message success">Cômodo registrado com sucesso!</div>');
				redirect('Reg_Room');
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao cadastrar Cômodo!</div>');
				log_message('error', 'Erro ao cadastrar o cômodo.');
			}
		}
	}
	
	public function delete($id){
		if($this->model->getRoom($id) == 0){
			if ($this->model->delete($id)){
				$this->session->set_flashdata('controller_message', '<div class="message success">Cômodo excluido com sucesso!</div>');
				redirect('Reg_Room');
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao exluir Cômodo!</div>');
				log_message('error', 'Erro ao excluir o cômodo.');
			}
		}else{
			$this->session->set_flashdata('controller_message', '<div class="message danger">Não é possivel excluir este cômodo, pois ele está vinculado a registros de equipamentos!</div>');
			log_message('error', 'Erro ao excluir o cômodo.');
			redirect('Reg_Room');
		}
		
	}
}