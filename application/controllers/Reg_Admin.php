<?php
class Reg_Admin extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        // Carrega o modelo
        $this->load->model('Reg_Admin_model', 'model', TRUE);

    }

    public function index()
    {
        $data['admins'] = $this->model->list_entries();
        $this->template->load('main_view', 'admin/fmins_admin', $data);
    }

    public function update($id=null)
    {
        if (isset($id)) {
            $data['userUpdate'] = $this->model->userUpdate($id);
            $data['admins'] = $this->model->list_entries();
            $this->template->load('main_view', 'admin/fmins_admin', $data);
        } else {
            // Insere o usuário no BD
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<span>', '</span>');
            // Define regras de validação
            $val_rules = array(
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
                )
            );
            $this->form_validation->set_rules($val_rules);
            // Validando
            if ($this->form_validation->run() == false) {
              $this->session->set_flashdata('controller_message', '<div class="message danger">Preencha o formulário corretamente!</div>');
              $this->update($this->input->post('id'));
            } else {

              $data['user'] = $this->input->post('txt_username');
              $data['password'] = md5(parent::$salt . $this->input->post('pwd_password'));
              $data['permission'] = 0;
              if ($this->model->update($this->input->post('id'), $data)) {
                $this->session->set_flashdata('controller_message', '<div class="message success">Usuário alterado com sucesso!</div>');
                redirect('Reg_Admin');
              } else {
                $this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao alterar o usuário.</div>');
                log_message('error', 'Erro ao cadastrar o usuário.');
              }
            }
        }

    }

    public function register()
    {
        // Carrega a biblioteca de validação de formulários e seta elemento de erros
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        // Define regras de validação
        $val_rules = array(
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
            )
        );
        $this->form_validation->set_rules($val_rules);
        // Validando
        if ($this->form_validation->run() == false) {
          $this->session->set_flashdata('controller_message', '<div class="message danger">Preencha o formulário corretamente!</div>');
          $this->index();
        } else {
            $data['user'] = $this->input->post('txt_username');
            $data['password'] = md5(parent::$salt . $this->input->post('pwd_password'));
            $data['permission'] = 0;
            // Insere o usuário no BD
            if ($this->model->insert($data)) {
              $this->session->set_flashdata('controller_message', '<div class="message success">Usuário cadastrado com sucesso!</div>');
              redirect('Reg_Admin');
            } else {
              $this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao cadastrar o usuário.</div>');
              log_message('error', 'Erro ao cadastrar o usuário.');
            }
        }
    }

    public function delete($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE permission='" . $_SESSION['permission'] . "'");
        if (COUNT($query->result()) == 1) {
					$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao excluir o cliente.</div>');
					redirect('Reg_Admin');
        } else {
            if (($this->model->delete($id))) {
							if ($id == $_SESSION['id']) {
								redirect('Initial/logout');
							} else {
								$this->session->set_flashdata('controller_message', '<div class="message success">Usuário excluído com sucesso!</div>');
								redirect('Reg_Admin');
							}
						}else {
							$this->session->set_flashdata('controller_message', '<div class="message danger">Erro ao excluir o usuário.</div>');
							redirect('Reg_Admin');
            }
            }
        }
    }
