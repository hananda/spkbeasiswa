<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_dokumensyarat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_dokumensyarat');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewDokumenSyarat', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_dokumensyarat->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_periode()
	{
		$result = $this->mod_dokumensyarat->crud_periode();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_dokumensyarat.php */
/* Location: ./application/controllers/con_dokumensyarat.php */