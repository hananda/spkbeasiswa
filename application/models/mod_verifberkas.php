<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_verifberkas extends CI_Model {

	public function getData()
	{
		$user_id = $this->session->userdata('user_id');
		$dataorder = array();
        $dataorder[3] = "nim_mahasiswa";
        $dataorder[4] = "nama_mahasiswa";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT 
				tp.*,mb.nama_beasiswa,tb.tgl_awal_beasiswa,tb.tgl_akhir_beasiswa,mm.nim_mahasiswa,mm.nama_mahasiswa
				FROM transaksi_pendaftaran tp
				JOIN transaksi_beasiswa tb ON tp.id_transaksi_beasiswa = tb.id_transaksi_beasiswa
				JOIN master_beasiswa mb ON tb.id_master_beasiswa = mb.id_beasiswa
				JOIN master_mahasiswa mm ON tp.id_mahasiswa = mm.id_mahasiswa
                WHERE id_status = 1
				";

		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(nama_mahasiswa = '". $search['value'] ."'
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
			$r[0] = $d['id_transaksi_pendaftaran'];
			$r[1] = $i;
            $r[2] = '
                <a style="cursor:pointer;" id="setujui_'. $d['id_transaksi_pendaftaran'] . '" data-id= "'. $d['id_transaksi_pendaftaran'] . '" >
                    <i class="mgRg5 fa fa-check" title="Verif berkas"></i>
                </a>
                <a style="cursor:pointer;" id="tolak_'. $d['id_transaksi_pendaftaran'] . '" data-id= "'. $d['id_transaksi_pendaftaran'] . '" >
                    <i class="mgRg5 fa fa-times" title="Tolak berkas"></i>
                </a>
				<a style="cursor:pointer;" id="view_'. $d['id_transaksi_pendaftaran'] . '" data-id= "'. $d['id_transaksi_pendaftaran'] . '" >
					<i class="mgRg5 fa fa-file" title="Lihat berkas"></i>
				</a>
			';
			$r[3] = $d['nim_mahasiswa'];
			$r[4] = '<a style="cursor:pointer;" class="viewmahasiswa" data-id="'.$d['id_mahasiswa'].'" >'.$d['nama_mahasiswa'].'</a>';
			$r[5] = $d['nama_beasiswa']." Periode ".$d['tgl_awal_beasiswa']. " - ".$d['tgl_akhir_beasiswa'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

    public function setujui()
    {
        $id = $this->input->post('id');
        $this->db->set('id_status',2);
        $this->db->where('id_transaksi_pendaftaran', $id);
        $this->db->update('transaksi_pendaftaran');
        return $this->db->affected_rows() > 0;
    }

    public function tolakberkas()
    {
        $id = $this->input->post('id');
        $catatanpenolakan = $this->input->post('catatanpenolakan');
        $this->db->set('id_status',3);
        $this->db->set('catatan',$catatanpenolakan);
        $this->db->where('id_transaksi_pendaftaran', $id);
        $this->db->update('transaksi_pendaftaran');
        return $this->db->affected_rows() > 0;
    }

}

/* End of file mod_verifberkas.php */
/* Location: ./application/models/mod_verifberkas.php */