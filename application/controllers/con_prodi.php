<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_prodi');
	}

	public function index()
	{
		$data = array();
		$data['jurusan'] = $this->mod_public->getDataJurusan();
		$data_view['content'] = $this->load->view('viewProdi', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_prodi->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_periode()
	{
		$result = $this->mod_prodi->crud_periode();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_prodi.php */
/* Location: ./application/controllers/con_prodi.php */