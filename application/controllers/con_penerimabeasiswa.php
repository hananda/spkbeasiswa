<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_penerimabeasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_public');
		$this->load->model('mod_penerimabeasiswa');
	}

	public function index()
	{
		$data = array();
		$data['periode'] = $this->mod_public->getPeriode();
		$data_view['content'] = $this->load->view('viewPenerimaBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_penerimabeasiswa->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function getDataranking()
	{
		$records = $this->mod_penerimabeasiswa->getDataranking();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function hitungspk($idperiode = 0)
	{
		$result = array();
		$result = $this->mod_penerimabeasiswa->getAlternatifbyPeriode($idperiode);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function setujuibeasiswa($idperiode = 0)
	{
		$result = array();
		$result = $this->mod_penerimabeasiswa->setujuibeasiswa($idperiode);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_penerimabeasiswa.php */
/* Location: ./application/controllers/con_penerimabeasiswa.php */