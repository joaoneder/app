<?php
class atividade extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('atividade_model');
        $this->load->helper('url_helper');
    }

    public function index($slug = NULL)
    {
        if(isset($_POST["status"]) && trim($_POST["status"] != ""))
        {			
			$data['atividade'] = $this->atividade_model->get_atividade_status($_POST["status"]);			
		}
		else
		{
			$data['atividade'] = $this->atividade_model->get_atividade();
		}
		
		$i = 0;
		foreach($data['atividade'] as $itemAtividade)
		{
			$arrStatus = $this->atividade_model->get_status($itemAtividade['status']);
			$data['atividade'][$i]['status'] = $arrStatus['status'];
			$i++;
		}		   
		$data['status'] = $this->atividade_model->get_status(); 
		$data['title'] = 'Lista de Atividades';    
        $this->load->view('templates/header', $data);
        $this->load->view('atividade/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['atividade_item'] = $this->atividade_model->get_atividade($slug);
        if (empty($data['atividade_item']))
        {
                show_404();
        }
        $data['title'] = $data['atividade_item']['nome'];
        $data['status'] = $data['atividade_item']['status'];
        $this->load->view('templates/header', $data);
        $this->load->view('atividade/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['status'] = $this->atividade_model->get_status(); 
		$data['title'] = 'Adicionar Atividade';

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('atividade/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->atividade_model->set_atividade();
			$this->load->view('atividade/success');
		}
	}
}
