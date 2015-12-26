<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_datapribadi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_datapribadi');
		$this->load->model('mod_datamahasiswa');
	}

	public function index()
	{
		$data = array();
		$data['datamahasiswa'] = $this->mod_datamahasiswa->getDataPribadi()->row();
		$data['prodi'] = $this->mod_public->getDataProdi();
		$data['jurusan'] = $this->mod_public->getDataJurusan();
		$data_view['content'] = $this->load->view('viewDatapribadi', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

}

/* End of file con_datapribadi.php */
/* Location: ./application/controllers/con_datapribadi.php */