<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_laporanbeasiswa extends CI_Model {

	public function datalaporan($idperiode=0)
	{
		$this->db->select('*,DATE_FORMAT(
				tgl_daftar_mahasiswa,
				"%d-%m-%Y"
			) AS tgl_daftar_mahasiswa2',false);
		$result = $this->db->get('view_pendaftaran');
		return $result;
	}

}

/* End of file mod_laporanbeasiswa.php */
/* Location: ./application/models/mod_laporanbeasiswa.php */