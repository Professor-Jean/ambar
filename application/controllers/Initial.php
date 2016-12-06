<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends MY_Controller {

	function __construct(){
		parent::__construct();
    // Carrega o modelo
    $this->load->model('Initial_model', 'model', TRUE);
	}

	public function index(){
		$this->load->view('initial_view');
	}

	public function registerUser(){

		// Carrega a biblioteca de validação de formulários e seta elemento de erros
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		// Define regras de validação
		$val_rules = array(
			array(
				'field' => 'txt_fullname',
				'label' => 'Nome Completo',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'txt_username',
				'label' => 'Usuário',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd_password',
				'label' => 'Senha',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd_confirmpassword',
				'label' => 'Confirmar senha',
				'rules' => 'trim|required|matches[pwd_password]'
			),
			array(
				'field' => 'txt_email',
				'label' => 'E-mail',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'txt_confirmemail',
				'label' => 'Confirmar e-mail',
				'rules' => 'trim|required|matches[txt_email]'
			)
		);
		$this->form_validation->set_rules($val_rules);
		// Validando
		if($this->form_validation->run() == false){
			$data['cad_errors'] = true;
			$this->load->view('initial_view', $data);
		} else {
			$data_user['user']       = $this->input->post('txt_username');
			$data_user['password']   = md5(parent::$salt.$this->input->post('pwd_password'));
			$data_user['permission'] = 1;
			$data_client['name']     = $this->input->post('txt_fullname');
			$data_client['email']    = $this->input->post('txt_email');

			// Insere o usuário no BD
			if ($id_usuario = $this->model->insert($data_user, $data_client)){
				// autentica o usuário
				$_SESSION['username']   = $data_user['user'];
				$_SESSION['permission'] = $data_user['permission'];

				$_SESSION['id']         = $id_usuario;
				redirect('Main');
			} else {
				log_message('error', 'Erro ao cadastrar o usuário.');
			}
		}
	}

	public function login(){

		// Carrega a biblioteca de validação de formulários e seta o elemento de erros
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		// Define regras de validação
		$val_rules = array(
			array(
				'field' => 'txt_usernamelog',
				'label' => 'Usuário',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'pwd_passwordlog',
				'label' => 'Senha',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($val_rules);
		// Validando
		if($this->form_validation->run() == false){
			$this->index();
		} else {
			$data['user'] = $this->input->post('txt_usernamelog');
			$data['password'] = md5(parent::$salt.$this->input->post('pwd_passwordlog'));
			$login = $this->model->login($data);
			if (!empty($login)){
				$login_data = (array)$login[0];
				$_SESSION['username']   = $login_data['user'];
				$_SESSION['permission'] = $login_data['permission'];
				$_SESSION['id']         = $login_data['id'];
				redirect('Main');
			} else {
				log_message('error', 'Erro ao fazer login.');
				redirect('initial');
			}
		}
	}

	public function logout(){
		session_destroy();
		redirect('initial');
	}

}
