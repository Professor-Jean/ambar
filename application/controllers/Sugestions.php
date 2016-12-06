<?php
class Sugestions extends MY_Controller{

	function __construct(){
		parent::__construct();
		// Carrega o modelo
		$this->load->model('Sugestions_model', 'model', TRUE);
	}

	public function index(){
    //encontrando o cliente
    //$client = $this->model->findClient($_SESSION['id']);
    //buscar client_equipment com inner join no equipment do cliente ativo
    $data['sugestions'] = $this->model->list_entries();
    //carregar a view passando os dados da pesquisa
    $this->template->load('main_view', 'sugestions/view_sugestions', $data);
		//$this->template->load('main_view', 'sugestions/view_sugestions');

	}
/*
	public function register(){

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
				redirect('Client_Equipment');
			} else {
				log_message('error', 'Erro ao cadastrar o equipamento.');
			}
		}

	}
*/

/*
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
*/
}
