<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dokumensyarat extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "nama_syarat_beasiswa";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT 
				*
				FROM master_syarat_beasiswa";
		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(nama_syarat_beasiswa = '". $search['value'] ."'
				 OR nama_syarat_beasiswa = '". $search['value'] ."')";
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
			$r[0] = $d['id_syarat_beasiswa'];
			$r[1] = $i;
            $r[2] = '
				<a id="editData" data-id= "'. $d['id_syarat_beasiswa'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_syarat_beasiswa'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[3] = $d['nama_syarat_beasiswa'];
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
        $result = array();
        $task = $this->input->post('task');
        $data = array();
        $filter['id_syarat_beasiswa'] = $this->input->post('iddokumensyarat');
        if($task != 'hapus'){
	        $data['nama_syarat_beasiswa'] = $this->input->post('namadokumensyarat'); 
	    }

        switch ($task) {
            case 'tambah':
            	$this->db->insert('master_syarat_beasiswa', $data);
                break;
            case 'ubah':
            	$this->db->where($filter);
                $this->db->update('master_syarat_beasiswa', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('master_syarat_beasiswa');
                break;
            
            default:
                # code...
                break;
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

/* End of file mod_dokumensyarat.php */
/* Location: ./application/models/mod_dokumensyarat.php */