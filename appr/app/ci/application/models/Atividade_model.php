<?php
class Atividade_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_atividade($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('atividade');
            return $query->result_array();
        }
        $query = $this->db->get_where('atividade', array('atividade_id' => $slug));
        return $query->row_array();
    }
    
    public function get_atividade_status($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('atividade');
            return $query->result_array();
        }
        $query = $this->db->get_where('atividade', array('status' => $slug));
        return $query->result_array();
    }
    
    public function set_atividade()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('nome'), 'dash', TRUE);

		$data = array(
			'nome' => $this->input->post('nome'),
			'status' => $this->input->post('status'),
			'descricao' => $this->input->post('descricao')
		);

		return $this->db->insert('atividade', $data);
	}
	
    public function get_status($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('status');
            return $query->result_array();
        }
        $query = $this->db->get_where('status', array('status_id' => $slug));
        return $query->row_array();
    }
}
