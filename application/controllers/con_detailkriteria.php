<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_detailkriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_kriteria');
		$this->load->model('mod_detailkriteria');
	}

	public function index()
	{
		$data = array();
		$data['kriteria'] = $this->mod_kriteria->getIdDanNama();
		$data_view['content'] = $this->load->view('viewDetailKriteria', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_detailkriteria->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_kriteria()
	{
		$result = $this->mod_detailkriteria->crud_kriteria();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_detailkriteria.php */
/* Location: ./application/controllers/con_detailkriteria.php */