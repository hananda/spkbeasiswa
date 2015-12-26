<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_datamahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mod_datamahasiswa');
	}

	public function index()
	{
		$data = array();
		$data_view['content'] = $this->load->view('viewDataMahasiswa', $data,TRUE);
		$this->load->view('viewMain',$data_view, FALSE);
	}

    public function getData()
    {
        $records = $this->mod_datamahasiswa->getData();
        $this->output->set_content_type('application/json')->set_output(json_encode($records));
    }

	public function editData()
	{
        $fotoname = $this->upload();
		$result = $this->mod_datamahasiswa->editData($fotoname);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

    public function nonaktif()
    {
        $result = $this->mod_datamahasiswa->nonaktif();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

	public function upload() {
        $name = "";
        $id = trim($this->input->post('idmhs'));
        if (isset($_FILES['fotomahasiswa'])) {
            header('Content-Type: application/json');

            //$valid_exts = ['jpg','png','jpeg','bmp'];

            $json = array();

            $path = './foto_mahasiswa/'.$id;


            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'bmp|jpg|png|jpeg';
            $config['max_size'] = '0';

            $this->load->library('upload');
            $this->upload->initialize($config);
            // $name = $_FILES['fotomahasiswa']['name'];

            if ($this->upload->do_upload('fotomahasiswa')) {
                //remove first
                $upload_data = $this->upload->data();
                $name = $upload_data['file_name'];
            }
        } 

        return $name;
    }

    public function getProdi()
    {
        $idjurusan = $this->input->post('idjrsn');
        $this->db->where('id_jurusan', $idjurusan);
        $data = $this->mod_public->getDataProdi()->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function viewmahasiswa($id='')
    {
        $this->db->where('id_mahasiswa', $id);
        $data['datamahasiswa'] = $this->db->get('view_mahasiswa')->row();
        $this->load->view('viewDetailMahasiswa', $data, FALSE);
    }

}

/* End of file con_datamahasiswa.php */
/* Location: ./application/controllers/con_datamahasiswa.php */