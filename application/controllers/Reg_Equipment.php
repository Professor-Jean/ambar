<?php
class Reg_Equipment extends MY_Controller{

    function __construct(){
        parent::__construct();
        // Carrega o modelo
        $this->load->model('Reg_Equipment_model', 'model', TRUE);

    }

    public function index(){
        $data['equipment'] = $this->model->list_entries();
        $this->template->load('main_view', 'equipment/view_equipment.php', $data);
    }

    public function update($id = NULL){
    	
      if(isset($id)){
        $data['equipment'] = $this->model->getEquipment($id);
        $this->template->load('main_view', 'equipment/fmupd_equipment.php', $data);
      }else{
	
				// Carrega a biblioteca de validação de formulários e seta elemento de erros
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<span>', '</span>');
				// Define regras de validação
				$val_rules = array(
					array(
						'field' => 'txt_type',
						'label' => 'Tipo',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_image',
						'label' => 'URL da Imagem',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_power',
						'label' => 'Potência padrão',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_use_time',
						'label' => 'Tempo padrão',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'sel_type',
						'label' => 'Tipo de consumo',
						'rules' => 'numeric|required'
					),
					array(
						'field' => 'txt_normal_time_1',
						'label' => 'Tempo normal 1',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_normal_time_2',
						'label' => 'Tempo normal 2',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_normal_time_3',
						'label' => 'Tempo normal 3',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_normal_power_1',
						'label' => 'Potência normal 1',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_normal_power_2',
						'label' => 'Potência normal 2',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_time_1',
						'label' => 'Sugestão de tempo baixo',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_time_2',
						'label' => 'Sugestão de tempo médio baixo',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_time_3',
						'label' => 'Sugestão de tempo médio alto',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_time_4',
						'label' => 'Sugestão de tempo alto',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_power_1',
						'label' => 'Sugestão de potência baixa',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_power_2',
						'label' => 'Sugestão de potência média',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'txt_sug_power_3',
						'label' => 'Sugestão de potência alta',
						'rules' => 'trim|required'
					)
				);
				$this->form_validation->set_rules($val_rules);
				// Validando
				if($this->form_validation->run() == false){
					$this->update($this->input->post('hid_id'));
				} else {
					$data['name']             = $this->input->post('txt_type');
					$data['image_url']        = $this->input->post('txt_image');
					$data['power']            = $this->input->post('txt_power');
					$data['use_time']         = $this->input->post('txt_use_time');
					$data['consumption_type'] = $this->input->post('sel_type');
					$data['sug_time_1']       = $this->input->post('txt_sug_time_1');
					$data['sug_time_2']       = $this->input->post('txt_sug_time_2');
					$data['sug_time_3']       = $this->input->post('txt_sug_time_3');
					$data['sug_time_4']       = $this->input->post('txt_sug_time_4');
					$data['sug_power_1']      = $this->input->post('txt_sug_power_1');
					$data['sug_power_2']      = $this->input->post('txt_sug_power_2');
					$data['sug_power_3']      = $this->input->post('txt_sug_power_3');
					$data['normal_time_1']    = $this->input->post('txt_normal_time_1');
					$data['normal_time_2']    = $this->input->post('txt_normal_time_2');
					$data['normal_time_3']    = $this->input->post('txt_normal_time_3');
					$data['normal_power_1']   = $this->input->post('txt_normal_power_1');
					$data['normal_power_2']   = $this->input->post('txt_normal_power_2');
					// Altera o equipamento no BD
					if ($this->model->update($this->input->post('hid_id'), $data)){
						$this->session->set_flashdata('controller_message', '<div class="message success">Equipamento alterado com sucesso.</div>');
						redirect('Reg_Equipment');
					} else {
						$this->session->set_flashdata('controller_message', '<div class="message success">Erro ao alterar o equipamento.</div>');
						log_message('error', 'Erro ao alterar o equipamento.');
						redirect('Reg_Equipment');
					}
				}
      	
      }

    }
		
    public function fm_register(){
			$this->template->load('main_view', 'equipment/fmins_equipment.php');
		}
    
    public function register(){
    	// Carrega a biblioteca de validação de formulários e seta elemento de erros
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			// Define regras de validação
			$val_rules = array(
				array(
					'field' => 'txt_type',
					'label' => 'Tipo',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_image',
					'label' => 'URL da Imagem',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_power',
					'label' => 'Potência padrão',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_use_time',
					'label' => 'Tempo padrão',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'sel_type',
					'label' => 'Tipo de consumo',
					'rules' => 'numeric|required'
				),
				array(
					'field' => 'txt_normal_time_1',
					'label' => 'Tempo normal 1',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_normal_time_2',
					'label' => 'Tempo normal 2',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_normal_time_3',
					'label' => 'Tempo normal 3',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_normal_power_1',
					'label' => 'Potência normal 1',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_normal_power_2',
					'label' => 'Potência normal 2',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_time_1',
					'label' => 'Sugestão de tempo baixo',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_time_2',
					'label' => 'Sugestão de tempo médio baixo',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_time_3',
					'label' => 'Sugestão de tempo médio alto',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_time_4',
					'label' => 'Sugestão de tempo alto',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_power_1',
					'label' => 'Sugestão de potência baixa',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_power_2',
					'label' => 'Sugestão de potência média',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'txt_sug_power_3',
					'label' => 'Sugestão de potência alta',
					'rules' => 'trim|required'
				)
			);
			$this->form_validation->set_rules($val_rules);
			// Validando
			if($this->form_validation->run() == false){
				$this->fm_register();
			} else {
				$data['name']             = $this->input->post('txt_type');
				$data['image_url']        = $this->input->post('txt_image');
				$data['power']            = $this->input->post('txt_power');
				$data['use_time']         = $this->input->post('txt_use_time');
				$data['consumption_type'] = $this->input->post('sel_type');
				$data['sug_time_1']       = $this->input->post('txt_sug_time_1');
				$data['sug_time_2']       = $this->input->post('txt_sug_time_2');
				$data['sug_time_3']       = $this->input->post('txt_sug_time_3');
				$data['sug_time_4']       = $this->input->post('txt_sug_time_4');
				$data['sug_power_1']      = $this->input->post('txt_sug_power_1');
				$data['sug_power_2']      = $this->input->post('txt_sug_power_2');
				$data['sug_power_3']      = $this->input->post('txt_sug_power_3');
				$data['normal_time_1']    = $this->input->post('txt_normal_time_1');
				$data['normal_time_2']    = $this->input->post('txt_normal_time_2');
				$data['normal_time_3']    = $this->input->post('txt_normal_time_3');
				$data['normal_power_1']   = $this->input->post('txt_normal_power_1');
				$data['normal_power_2']   = $this->input->post('txt_normal_power_2');
				// Insere o equipamento no BD
				if ($this->model->insert($data)){
					$this->session->set_flashdata('controller_message', '<div class="message success">Equipamento cadastrado com sucesso.</div>');
					redirect('Reg_Equipment');
				} else {
					$this->session->set_flashdata('controller_message', '<div class="message success">Erro ao cadastrar o equipamento.</div>');
					log_message('error', 'Erro ao cadastrar o equipamento.');
					redirect('Reg_Equipment');
				}
			}
    }

    public function delete($id){
			if ($this->model->checkDependency($id)) {
				if ($this->model->delete($id)) {
					$this->session->set_flashdata('controller_message', '<div class="message success">Equipamento excluído com sucesso.</div>');
					redirect('Reg_Equipment');
				} else {
					$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao excluir o equipamento.</div>');
					log_message('error', 'Erro ao excluir o equipamento.');
					redirect('Reg_Equipment');
				}
			} else {
				$this->session->set_flashdata('controller_message', '<div class="message danger">Impossível excluir equipamento: existem equipamentos de clientes cadastrados a ele.</div>');
				log_message('error', 'Impossível excluir equipamento: existem equipamentos de clientes cadastrados a ele.');
				redirect('Reg_Equipment');
			}
    }

}
