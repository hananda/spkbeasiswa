<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_beasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_beasiswa');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function getData()
	{
		$records = $this->mod_beasiswa->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
	}

	public function crud_periode()
	{
		$result = $this->mod_beasiswa->crud_periode();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function cetakbukti($idpendaftaran = 0)
	{
		$this->load->library('mpdf60/mpdf');
		$data = array();
		$data['datamhs'] = $this->db->query("SELECT * FROM view_pendaftaran WHERE id_transaksi_pendaftaran = ".$idpendaftaran)->row();
		$template = $this->load->view('viewBuktiBeasiswa',$data,true);
		$mpdf=new mPDF('c'); 

		$mpdf->WriteHTML($template);
		$mpdf->Output();
		exit;
	}

	public function cetakbukti2()
	{
		$this->load->view('viewBuktiBeasiswa');
	}

}

/* End of file con_beasiswa.php */
/* Location: ./application/controllers/con_beasiswa.php */