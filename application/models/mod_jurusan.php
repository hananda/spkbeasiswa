<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_jurusan extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "nama_jurusan";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT 
				*
				FROM master_jurusan";
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
			$r[0] = $d['id_jurusan'];
			$r[1] = $i;
            $r[2] = '
				<a id="editData" data-id= "'. $d['id_jurusan'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_jurusan'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[3] = $d['nama_jurusan'];
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
        $filter['id_jurusan'] = $this->input->post('idjurusan');
        if($task != 'hapus'){
	        $data['nama_jurusan'] = $this->input->post('namajurusan'); 
	    }

        switch ($task) {
            case 'tambah':
            	$this->db->insert('master_jurusan', $data);
                break;
            case 'ubah':
            	$this->db->where($filter);
                $this->db->update('master_jurusan', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('master_jurusan');
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

/* End of file mod_jurusan.php */
/* Location: ./application/models/mod_jurusan.php */