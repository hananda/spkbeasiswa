<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_pengumuman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_pengumuman');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewPengumuman', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_pengumuman->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_pengumuman()
	{
		$result = $this->mod_pengumuman->crud_pengumuman();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function getdesc()
	{
		$result = $this->mod_pengumuman->getdesc();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_pengumuman.php */
/* Location: ./application/controllers/con_pengumuman.php */