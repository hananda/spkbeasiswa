<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_datamahasiswa extends CI_Model {

	function getData()
	{
		$dataorder = array();
        $dataorder[2] = "nim_mahasiswa";
        $dataorder[3] = "nama_mahasiswa";
        $dataorder[4] = "alamat_mahasiswa";
        $dataorder[5] = "nama_prodi";
        $dataorder[6] = "nama_jurusan";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT * FROM view_mahasiswa";
		
		// var_dump($search);

		if($search['value'] != ''){
			$query .= " WHERE (nim_mahasiswa LIKE '%". strtoupper($search['value']) ."%'
					OR UPPER(nama_mahasiswa) LIKE '%". strtoupper($search['value']) ."%'
					OR UPPER(alamat_mahasiswa) LIKE '%". strtoupper($search['value']) ."%'
					OR UPPER(nama_prodi) LIKE '%". strtoupper($search['value']) ."%'
					OR UPPER(nama_jurusan) LIKE '%". strtoupper($search['value']) ."%'
				)";
		}

		if($order){
            $query.= " order by 
                ".$dataorder[$order[0]["column"]]." ".$order[0]["dir"];
        }

        $iTotalRecords = $this->db->query("SELECT COUNT(*) AS JUMLAH FROM (".$query.") A")->row()->JUMLAH;

        $query .= " LIMIT ". ($start) .",".(($start) + $iDisplayLength);

        $data = $this->db->query($query)->result_array();
        $i = 1;
        $result = array();
        foreach ($data as $d) {
            $r = array();
			$r[0] = $d['id_mahasiswa'];
			$r[1] = $i;
			$r[2] = $d['nim_mahasiswa'];
			$r[3] = '<a style="cursor:pointer;" class="viewmahasiswa" data-id="'.$d['id_mahasiswa'].'" >'.$d['nama_mahasiswa'].'</a>';
			$r[4] = $d['alamat_mahasiswa'];
			$r[5] = $d['nama_prodi'];
			$r[6] = $d['nama_jurusan'];
            $r[7] = $d['nama_user'];
			$r[8] = '<a style="cursor:pointer;" class="nonaktif" data-id= "'. $d['id_mahasiswa'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Non Aktifkan user dan mahasiswa ini"></i>
                </a>';
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

	function getDataPribadi()
	{
		$iduser = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->where('id_user', $iduser);
		$result = $this->db->get('master_mahasiswa');
		return $result;
	}

	function editData($foto = "")
	{
		$nim = trim($this->input->post('nimmhs'));
		$nama = trim($this->input->post('nmmhs'));
        $alamat = trim($this->input->post('almtmhs'));
        $telpon = trim($this->input->post('tlpmhs'));
        $prodi = trim($this->input->post('prd'));
        $jurusan = trim($this->input->post('jrsan'));
        $id = trim($this->input->post('idmhs'));
        $jenkel = trim($this->input->post('jenkel'));

        $data = array(
        	'nama_mahasiswa' => $nama,
        	'alamat_mahasiswa' => $alamat,
        	'telpon_mahasiswa' => $telpon,
        	'prodi_mahasiswa' => $prodi,
        	'jurusan_mahasiswa' => $jurusan,
        	'nim_mahasiswa' => $nim,
            'jenis_kelamin'=>$jenkel
        );

        if($foto)
        	$data['foto_mahasiswa'] = $foto;

        $this->db->where('id_mahasiswa', $id);
        $this->db->update('master_mahasiswa', $data);

        $result = array();

        if($this->db->affected_rows()){
        	$result['status'] = true;
        	$result['message'] = "Data Berhasil Di edit";
        }else{
        	$result['status'] = false;
        	$result['message'] = "Data Gagal Di edit";
        }

        return $result;
	}

    public function nonaktif()
    {
        $result = array();
        $id = $this->input->post('idmhs');
        $this->db->where('id_mahasiswa', $id);
        $data = $this->db->get('view_mahasiswa')->row();

        //nontaktif mahasiswa
        $this->db->where('id_mahasiswa', $data->id_mahasiswa);
        $this->db->update('master_mahasiswa', array("aktif_mahasiswa"=>"T"));

        //nonaktif user
        $this->db->where('id_user', $data->id_user);
        $this->db->update('master_user', array("aktif_user"=>"T"));

        if ($this->db->affected_rows() > 0) {
            $result['message'] = "data berhasil dinon aktfikan";
            $result['status'] = true;
        }else{
            $result['message'] = "data gagal dinon aktfikan";
            $result['status'] = false;
        }

        return $result;
    }

}

/* End of file mod_datamahasiswa.php */
/* Location: ./application/models/mod_datamahasiswa.php */