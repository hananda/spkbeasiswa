<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_formpengajuanbeasiswa extends CI_Model {

	public function ajukanbeasiswa()
	{
		$tpendaftaran = array();
		$tkriteria = array();
		$kriteria = $this->mod_public->getKriteria();
		$idmahasiswa = $this->input->post('idmahasiswa');
		$idtransaksibeasiswa = $this->input->post('periode');

		//insert transaksi pendaftaran
		$this->db->set('tgl_daftar_mahasiswa','STR_TO_DATE("'.date('d/m/Y').'","%d/%m/%Y")',FALSE);
		$tpendaftaran['id_mahasiswa'] = $idmahasiswa;
		$tpendaftaran['id_transaksi_beasiswa'] = $idtransaksibeasiswa;
		$tpendaftaran['id_user'] = $this->session->userdata('user_id');
		$this->db->insert('transaksi_pendaftaran', $tpendaftaran);
		$idtransaksipendaftaran = $this->db->insert_id();

		//insert transaksi kriteria
		foreach ($kriteria->result() as $r) {
			$temp = array(
				'id_kriteria'=>$r->id_kriteria,
				'id_detail_kriteria'=> $this->input->post('kriteria_'.$r->id_kriteria),
				'id_transaksi_pendaftaran'=>$idtransaksipendaftaran
			);

			array_push($tkriteria, $temp);
		}
		$this->db->insert_batch('transaksi_kriteria', $tkriteria);

		$result = array();
		if($this->db->affected_rows() > 0){
			$result['status'] = true;
			$result['id'] = $idtransaksipendaftaran;
        	$result['message'] = "Data Berhasil Di Simpan";
		}else{
			$result['status'] = false;
        	$result['message'] = "Data Gagal Di Simpan";
		}
		return $result;
	}

	public function saveedit()
	{
		$kriteria = $this->mod_public->getKriteria();
		$idtransaksipendaftaran = $this->input->post('id');

		//insert transaksi kriteria
		foreach ($kriteria->result() as $r) {
			$filter = array(
				'id_kriteria'=>$r->id_kriteria,
				'id_transaksi_pendaftaran'=>$idtransaksipendaftaran
			);
			$this->db->set('id_detail_kriteria',$this->input->post('kriteria_'.$r->id_kriteria));
			$this->db->where($filter);
			$this->db->update('transaksi_kriteria');
		}

		$result = array();
		$result['status'] = true;
		$result['id'] = $idtransaksipendaftaran;
    	$result['message'] = "Data Berhasil Di Ubah";
		return $result;
	}

	public function saveupload($idpendaftaran = 0,$idsyarat=0,$name='')
	{
		$data = array(
			'id_transaksi_pendaftaran'=>$idpendaftaran,
			'id_syarat'=>$idsyarat,
			'foto_syarat_beasiswa'=>$name
		);
		$this->db->insert('transaksi_syarat_beasiswa', $data);
	}

	public function getDataSyarat($id=0,$idsyarat=0)
	{
		$this->db->select('*');
		$this->db->where('id_transaksi_pendaftaran', $id);
		if ($idsyarat) {
			$this->db->where('id_syarat', $idsyarat);
		}
		$result = $this->db->get('transaksi_syarat_beasiswa');
		return $result;
	}

	public function deletefoto($id=0)
	{
		$this->db->where('id_transaksi_syarat_beasiswa', $id);
		$this->db->delete('transaksi_syarat_beasiswa');
		return $this->db->affected_rows() > 0;
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->db->where('id_transaksi_pendaftaran', $id);
		$this->db->delete('transaksi_pendaftaran');
		$this->db->where('id_transaksi_pendaftaran', $id);
		$this->db->delete('transaksi_kriteria');
		$this->db->where('id_transaksi_pendaftaran', $id);
		$this->db->delete('transaksi_syarat_beasiswa');
		$dir = "./upload_syarat/".$id;
		$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
		$files = new RecursiveIteratorIterator($it,
		             RecursiveIteratorIterator::CHILD_FIRST);
		foreach($files as $file) {
		    if ($file->isDir()){
		        rmdir($file->getRealPath());
		    } else {
		        unlink($file->getRealPath());
		    }
		}
		rmdir($dir);
		return true;
	}

	function getKriteria($idpendaftaran=0)
	{
		$result = $this->db->query('SELECT
					mk.*,tk.id_detail_kriteria
				FROM
					master_kriteria mk
				LEFT JOIN transaksi_kriteria tk ON mk.id_kriteria = tk.id_kriteria 
				and tk.id_transaksi_pendaftaran = '.$idpendaftaran);
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

}

/* End of file mod_formpengajuanbeasiswa.php */
/* Location: ./application/models/mod_formpengajuanbeasiswa.php */