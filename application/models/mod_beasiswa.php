<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_beasiswa extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "tgl_awal_beasiswa";
        $dataorder[4] = "tgl_akhir_beasiswa";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT id_transaksi_beasiswa,
				DATE_FORMAT(tgl_awal_beasiswa,'%d/%m/%Y') as tgl_awal_beasiswa, 
				DATE_FORMAT(tgl_akhir_beasiswa,'%d/%m/%Y') as tgl_akhir_beasiswa,
                tgl_pengesahan_beasiswa,
                no_surat_pengesahan
				FROM transaksi_beasiswa";
		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(tgl_awal_beasiswa = '". $search['value'] ."'
				 OR tgl_akhir_beasiswa = '". $search['value'] ."')";
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
			$r[0] = $d['id_transaksi_beasiswa'];
			$r[1] = $i;
            $r[2] = '
				<a id="editData" data-id= "'. $d['id_transaksi_beasiswa'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_transaksi_beasiswa'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[3] = $d['tgl_awal_beasiswa'];
            $r[4] = $d['tgl_akhir_beasiswa'];
            $r[5] = $d['tgl_pengesahan_beasiswa'];
			$r[6] = $d['no_surat_pengesahan'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

    public function crud_periode()
    {
        $sudahada = false;
        $result = array();
        $task = $this->input->post('task');
        $filter['id_transaksi_beasiswa'] = $this->input->post('idperiode');
        if($task != 'hapus'){
	        $periode = $this->input->post('periodebeasiswa');
            $nosurat = $this->input->post('nosurat');
            $tglpengesahan = $this->input->post('tglpengesahan');
	        $periode = explode('-', $periode);
	        $data['id_master_beasiswa'] = 1; //masih untuk beasiswa supersmar
            $data['no_surat_pengesahan'] = $nosurat;
	        $periodeawal = $periode[0];
	        $periodeakhir = $periode[1];
	    }

        switch ($task) {
            case 'tambah':
                $sqlcek = "SELECT
                                *
                            FROM
                                transaksi_beasiswa
                            WHERE
                                (
                                    STR_TO_DATE('".$periodeawal."', '%d/%m/%Y') BETWEEN tgl_awal_beasiswa
                                    AND tgl_akhir_beasiswa
                                )
                            OR (
                                STR_TO_DATE('".$periodeakhir."', '%d/%m/%Y') BETWEEN tgl_awal_beasiswa
                                AND tgl_akhir_beasiswa
                            )";
                $querycek = $this->db->query($sqlcek);
                if(@$querycek->num_rows > 0){
                    $sudahada = true;
                }
                if(!$sudahada){
                	$this->db->set('tgl_awal_beasiswa','STR_TO_DATE("'.$periodeawal.'","%d/%m/%Y")',FALSE);
                    $this->db->set('tgl_akhir_beasiswa','STR_TO_DATE("'.$periodeakhir.'","%d/%m/%Y")',FALSE);
                	$this->db->set('tgl_pengesahan_beasiswa','STR_TO_DATE("'.$tglpengesahan.'","%d/%m/%Y")',FALSE);
                    $this->db->insert('transaksi_beasiswa', $data);
                }
                break;
            case 'ubah':
            	$this->db->set('tgl_awal_beasiswa','STR_TO_DATE("'.$periodeawal.'","%d/%m/%Y")',FALSE);
            	$this->db->set('tgl_akhir_beasiswa','STR_TO_DATE("'.$periodeakhir.'","%d/%m/%Y")',FALSE);
                $this->db->set('tgl_pengesahan_beasiswa','STR_TO_DATE("'.$tglpengesahan.'","%d/%m/%Y")',FALSE);
                $this->db->where($filter);
                $this->db->update('transaksi_beasiswa', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('transaksi_beasiswa');
                break;
            
            default:
                # code...
                break;
        }

        if($sudahada){
            $result['status'] = false;
            $result['message'] = "Data Periode sudah ada";
            return $result;
        }

        if($this->db->affected_rows() > 0){
            $result['status'] = true;
            $result['message'] = "Data Berhasil Di ".$task;
        }else{
            $result['status'] = false;
            $result['message'] = "Data Gagal Di ".$task;
        }
        return $result;
    }

}

/* End of file mod_beasiswa.php */
/* Location: ./application/models/mod_beasiswa.php */