<?php
class Reg_client extends MY_Controller{

    function __construct(){
        parent::__construct();
        // Carrega o modelo
        $this->load->model('Reg_Client_model', 'model', TRUE);

    }

    public function index(){
        $data['clients'] = $this->model->list_entries();
        $this->template->load('main_view', 'client/fmins_client', $data);
    }

    public function update($id=null){
      if(isset($id)){
        $data['userUpdate'] = $this->model->userUpdate($id);
        $data['clientUpdate'] = $this->model->clientUpdate($id);
        $this->template->load('main_view', 'client/fmins_client', $data);
      }else{
        $data['email']      = $this->input->post('txt_email');
        $data['fullname']   = $this->input->post('txt_fullname');
        $data['user']       = $this->input->post('txt_username');
        $data['password']   = md5(parent::$salt.$this->input->post('pwd_password'));
        $data['permission'] = 1;
        // Insere o usuário no BD
        if ($this->model->update($_SESSION['id'],$data)){
            $_SESSION['username'] = $data['user'];
            redirect('Main');
        }else{
            log_message('error', 'Erro ao cadastrar o usuário.');
        }
      }
    }


    public function delete($id) {
			if (($this->model->delete($id))) {
				if ($id == $_SESSION['id']) {
					redirect('Initial/logout');
				} else {
					redirect('Reg_Client');
				}
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao excluir o usuário.</div>');
				redirect('Reg_Client');
			}
		}
		
	}
	