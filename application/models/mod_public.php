<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_public extends CI_Model {

	function getDataProdi()
	{
		$this->db->select('id_prodi,nama_prodi');
		$result = $this->db->get('master_prodi');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

	function getDataJurusan()
	{
		$this->db->select('id_jurusan,nama_jurusan');
		$result = $this->db->get('master_jurusan');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}	

	function getKriteria()
	{
		$this->db->select('id_kriteria,nama_kriteria');
		$result = $this->db->get('master_kriteria');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

	function getDetailKriteria()
	{
		$this->db->select('id_kriteria,id_detail_kriteria,nama_detail_kriteria');
		$result = $this->db->get('master_detail_kriteria');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

	function getPengumuman()
	{
		$this->db->select('judul_pengumuman,desc_pengumuman');
		$this->db->where('aktif_pengumuman', 'Y');
		$this->db->order_by('tgl_pengumuman', 'desc');
		$result = $this->db->get('master_pengumuman');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

	function getSyarat()
	{
		$this->db->select('id_syarat_beasiswa,nama_syarat_beasiswa');
		$result = $this->db->get('master_syarat_beasiswa');
		if($result->num_rows > 0)
			return $result;
		else 
			return 0;
	}

	public function getPeriode($filter=array())
	{
		$this->db->select('id_transaksi_beasiswa,
			id_master_beasiswa,
			DATE_FORMAT(
				tgl_awal_beasiswa,
				"%d-%m-%Y"
			) AS tgl_awal_beasiswa,
			DATE_FORMAT(
				tgl_akhir_beasiswa,
				"%d-%m-%Y"
			) AS tgl_akhir_beasiswa',false);

		if(count($filter) > 0)
			$this->db->where($filter);
		
		$result = $this->db->get('transaksi_beasiswa');
		return $result;
	}

	function getPeriodeBeasiswa()
	{
		$iduser = $this->session->userdata('user_id');
		$tglskr = date('d/m/Y');
		$sql = "SELECT
					tb.*
				FROM
					transaksi_beasiswa tb
				LEFT JOIN transaksi_pendaftaran tp ON tb.id_transaksi_beasiswa = tp.id_transaksi_beasiswa AND id_user = ".$iduser."
				WHERE
					(
						STR_TO_DATE('".$tglskr."', '%d/%m/%Y') BETWEEN tgl_awal_beasiswa
						AND tgl_akhir_beasiswa
					)
				AND id_transaksi_pendaftaran IS NULL
				ORDER BY tgl_awal_beasiswa DESC";

		$query = $this->db->query($sql);
		// var_dump($query);
		if($query->num_rows > 0)
			return $query;
		else
			return 0;
	}
}

/* End of file mod_public.php */
/* Location: ./application/models/mod_public.php */