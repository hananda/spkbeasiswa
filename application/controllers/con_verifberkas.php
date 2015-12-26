<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_verifberkas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_public');
		$this->load->model('mod_formpengajuanbeasiswa');
		$this->load->model('mod_verifberkas');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewVerifBerkas', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_verifberkas->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function setujui()
	{
		$result = array();
		$result['status'] = $this->mod_verifberkas->setujui();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function contenttolak($id=0)
	{
		$data = array();
		$data['id'] = $id;
		$this->load->view('viewContentTolakberkas', $data, FALSE);
	}

	public function tolakberkas()
	{
		$result = array();
		$result['status'] = $this->mod_verifberkas->tolakberkas();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function contentview($id=0)
	{
		$data = array();
		$data['id'] = $id;
		$data['kriteria'] = $this->mod_formpengajuanbeasiswa->getKriteria($id);
		$data['detilkriteria'] = $this->mod_public->getDetailKriteria();
		$data['syarat'] = $this->mod_public->getSyarat();
		$data['datasyarat'] = $this->mod_formpengajuanbeasiswa->getDataSyarat($id);
		$this->load->view('viewContentBerkas', $data, FALSE);
	}

}

/* End of file con_verifberkas.php */
/* Location: ./application/controllers/con_verifberkas.php */