<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_formpengajuanbeasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_formpengajuanbeasiswa');
		$this->load->model('mod_datamahasiswa');
	}

	public function index()
	{
		$data = array();
		$data['periode'] = $this->mod_public->getPeriodeBeasiswa();
		$data['kriteria'] = $this->mod_public->getKriteria();
		$data['mahasiswa'] = $this->mod_datamahasiswa->getDataPribadi()->row();
		$data['detilkriteria'] = $this->mod_public->getDetailKriteria();

		$data_view['content'] = $this->load->view('viewFormPengajuanBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function editkriteria($id=0)
	{
		$data = array();
		$data['id'] = $id;
		$data['kriteria'] = $this->mod_formpengajuanbeasiswa->getKriteria($id);
		$data['detilkriteria'] = $this->mod_public->getDetailKriteria();

		$data_view['content'] = $this->load->view('viewFormEditPengajuanBeasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function uploadsyarat($id= 0)
	{
		$data = array();
		$data['id'] = $id;
		$data['syarat'] = $this->mod_public->getSyarat();
		$data['datasyarat'] = $this->mod_formpengajuanbeasiswa->getDataSyarat($id);
		$data_view['content'] = $this->load->view('viewFormUploadSyarat', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

	public function ajukanbeasiswa()
	{
		$result = $this->mod_formpengajuanbeasiswa->ajukanbeasiswa();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function saveedit()
	{
		$result = $this->mod_formpengajuanbeasiswa->saveedit();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function uploadberkas($idpendaftaran = 0,$idsyarat = 0)
	{
		$name = "";
        if (isset($_FILES['myfile'])) {

            $json = array();

            $path = './upload_syarat/'.$idpendaftaran.'/'.$idsyarat.'/';


            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'bmp|jpg|png|jpeg|gif|doc|pdf';
            $config['max_size'] = '0';

            $this->load->library('upload');
            $this->upload->initialize($config);
            // $name = $_FILES['fotomahasiswa']['name'];

            if ($this->upload->do_upload('myfile')) {
                //remove first
                $upload_data = $this->upload->data();
                $name = $upload_data['file_name'];
                $this->mod_formpengajuanbeasiswa->saveupload($idpendaftaran,$idsyarat,$name);
            }
        } 
        $ret[] = $name;
        $this->output->set_content_type('application/json')->set_output(json_encode($ret));
	}

	public function reloadimage($id=0,$idsyarat=0)
	{
		$html = '';
		$data = $this->mod_formpengajuanbeasiswa->getDataSyarat($id,$idsyarat);
		foreach ($data->result() as $r) {
			$html.= '<li><a href="'.base_url().'upload_syarat/'.$id.'/'.$idsyarat.'/'.$r->foto_syarat_beasiswa.'" rel="prettyPhoto[gallery'.$idsyarat.']"><img src="'.base_url().'upload_syarat/'.$id.'/'.$idsyarat.'/'.$r->foto_syarat_beasiswa.'" width="60" height="60" alt="" /></a>
			<button class="btn btn-info btn-sm btnhapusfoto" data-id="'.$r->id_transaksi_syarat_beasiswa.'" data-idsyarat="'.$idsyarat.'">Hapus</button></li>';
		}
		echo $html;
	}

	public function deletefoto($id=0)
	{
		$result = array();
		$result['status'] = $this->mod_formpengajuanbeasiswa->deletefoto($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function delete()
	{
		$result = array();
		$result['status'] = $this->mod_formpengajuanbeasiswa->delete();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_formpengajuanbeasiswa.php */
/* Location: ./application/controllers/con_formpengajuanbeasiswa.php */