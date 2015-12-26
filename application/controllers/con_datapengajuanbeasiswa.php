<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_datapengajuanbeasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_datapengajuanbeasiswa');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewDataPengajuanBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_datapengajuanbeasiswa->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

}

/* End of file con_datapengajuanbeasiswa.php */
/* Location: ./application/controllers/con_datapengajuanbeasiswa.php */