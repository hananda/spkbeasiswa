<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_kriteria');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewKriteria', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_kriteria->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_kriteria()
	{
		$result = $this->mod_kriteria->crud_kriteria();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_kriteria.php */
/* Location: ./application/controllers/con_kriteria.php */