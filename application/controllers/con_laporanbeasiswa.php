<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_laporanbeasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_laporanbeasiswa');
	}

	public function index()
	{
		$data = array();
		$data['periode'] = $this->mod_public->getPeriode();
		$data_view['content'] = $this->load->view('viewLaporanBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function laporan($idperiode=0)
	{
		$data = array();
		$data['periode'] = $this->mod_public->getPeriode(array('id_transaksi_beasiswa'=>$idperiode));
		$data['data'] = $this->mod_laporanbeasiswa->datalaporan($idperiode);
		$this->load->view('viewdoklaporanbeasiswa', $data, FALSE);
	}

}

/* End of file con_laporanbeasiswa.php */
/* Location: ./application/controllers/con_laporanbeasiswa.php */