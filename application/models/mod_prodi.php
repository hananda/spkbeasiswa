<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_prodi extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "nama_prodi";
        $dataorder[4] = "master_prodi.id_jurusan";
        $dataorder[5] = "master_prodi.id_prodi";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT 
				master_prodi.*,nama_jurusan
				FROM master_prodi
				LEFT JOIN master_jurusan ON master_prodi.id_jurusan = master_jurusan.id_jurusan";
		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(nama_prodi = '". $search['value'] ."'
				 OR nama_prodi = '". $search['value'] ."')";
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
			$r[0] = $d['id_prodi'];
			$r[1] = $d['id_jurusan'];
			$r[2] = $i;
            $r[3] = '
				<a id="editData" data-id= "'. $d['id_prodi'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_prodi'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[4] = $d['nama_jurusan'];
			$r[5] = $d['nama_prodi'];
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
        $filter['id_prodi'] = $this->input->post('idprodi');
        if($task != 'hapus'){
	        $data['nama_prodi'] = $this->input->post('namaprodi'); 
	        $data['id_jurusan'] = $this->input->post('jrsan'); 
	    }

        switch ($task) {
            case 'tambah':
            	$this->db->insert('master_prodi', $data);
                break;
            case 'ubah':
            	$this->db->where($filter);
                $this->db->update('master_prodi', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('master_prodi');
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

/* End of file mod_prodi.php */
/* Location: ./application/models/mod_prodi.php */