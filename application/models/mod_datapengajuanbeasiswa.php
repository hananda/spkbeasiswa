<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_datapengajuanbeasiswa extends CI_Model {

	public function getData()
	{
		$user_id = $this->session->userdata('user_id');
		$dataorder = array();
        $dataorder[3] = "nama_beasiswa";
        $dataorder[5] = "tgl_daftar_mahasiswa";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT 
				tp.*,mb.nama_beasiswa,tb.tgl_awal_beasiswa,tb.tgl_akhir_beasiswa,(NOW() BETWEEN tgl_awal_beasiswa and tgl_akhir_beasiswa) as aktif
				FROM transaksi_pendaftaran tp
				JOIN transaksi_beasiswa tb ON tp.id_transaksi_beasiswa = tb.id_transaksi_beasiswa
				JOIN master_beasiswa mb ON tb.id_master_beasiswa = mb.id_beasiswa
				WHERE id_user = ".$user_id;
		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(nama_jurusan = '". $search['value'] ."'
				 OR nama_jurusan = '". $search['value'] ."')";
		}
        // OR PROGRAM_TAHUN LIKE '%". strtolower($search) ."%'

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
            $idstatus = $d['id_status'];
            $btncetak = '';
            if ($idstatus == 1) {
                $label = 'default';
                $status = 'Berkas Diajukan';
            }else if($idstatus == 2){
                $label = 'warning';
                $status = 'Berkas Terverifikasi';
            }else if($idstatus == 3){
                $label = 'danger';
                $status = 'Berkas Kurang Lengkap';
            }else if($idstatus == 4){
                $btncetak = '<a id="print_'. $d['id_transaksi_pendaftaran'] . '" href="'.base_url().'con_beasiswa/cetakbukti/'.$d['id_transaksi_pendaftaran'].'" target="_blank" data-id= "'. $d['id_transaksi_pendaftaran'] . '" >
                        <i class="mgRg5 fa fa-print" title="Cetak Surat Penerima Beasiswa"></i>
                    </a>';
                $label = 'success';
                $status = 'Mendapatkan Beasiswa';
            }else if($idstatus == 5){
                $label = 'danger';
                $status = 'Tidak Mendapatkan Beasiswa';
            }
			$r[0] = $d['id_transaksi_pendaftaran'];
			$r[1] = $i;
            if ($d['aktif']) {
                $r[2] = '
                    <a id="editData_'. $d['id_transaksi_pendaftaran'] . '" href="'.base_url().'con_formpengajuanbeasiswa/editkriteria/'.$d['id_transaksi_pendaftaran'].'" data-id= "'. $d['id_transaksi_pendaftaran'] . '" >
                        <i class="mgRg5 fa fa-pencil" title="Ubah"></i>
                    </a>
                    <a id="deleteData_'. $d['id_transaksi_pendaftaran'] . '" data-id= "'. $d['id_transaksi_pendaftaran'] . '" href="" >
                        <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                    </a>
                    <a id="uploadsyarat_'. $d['id_transaksi_pendaftaran'] . '" data-id= "'. $d['id_transaksi_pendaftaran'] . '" href="'.base_url().'con_formpengajuanbeasiswa/uploadsyarat/'.$d['id_transaksi_pendaftaran'].'">
                        <i class="mgRg5 fa fa-cloud-upload" title="Upload Syarat"></i>
                    </a>
                ';
            }else{
                $r[2] = $btncetak;
            }

			$r[3] = $d['nama_beasiswa'];
			$r[4] = $d['tgl_awal_beasiswa']. " - ".$d['tgl_akhir_beasiswa'];
            $r[5] = $d['tgl_daftar_mahasiswa'];
			$r[6] = '<span class="label label-'.$label.'">'.$status.'</span>';
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

}

/* End of file mod_datapengajuanbeasiswa.php */
/* Location: ./application/models/mod_datapengajuanbeasiswa.php */