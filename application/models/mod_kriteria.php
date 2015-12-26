<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kriteria extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "nama_kriteria";
        $dataorder[4] = "bobot_kriteria";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT * FROM master_kriteria";
		if($search){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(UPPER(nama_kriteria) LIKE '%". strtoupper($search['value']) ."%')";
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
			$r[0] = $d['id_kriteria'];
			$r[1] = $i;
            $r[2] = '
				<a id="editData" data-id= "'. $d['id_kriteria'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_kriteria'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[3] = $d['nama_kriteria'];
			$r[4] = $d['bobot_kriteria'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

    public function crud_kriteria()
    {
        $result = array();
        $task = $this->input->post('task');
        $filter['id_kriteria'] = $this->input->post('idkriteria');
        $data['nama_kriteria'] = $this->input->post('nmkriteria');
        $data['bobot_kriteria'] = $this->input->post('btkriteria');
        switch ($task) {
            case 'tambah':
                $this->db->insert('master_kriteria', $data);
                break;
            case 'ubah':
                $this->db->where($filter);
                $this->db->update('master_kriteria', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('master_kriteria');
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

    function getIdDanNama($filter = array())    
    {
        $this->db->select('id_kriteria,nama_kriteria');
        if(count($filter) > 0 ){
            $this->db->where($filter);
        }
        $result = $this->db->get('master_kriteria');
        return $result;
    }

}

/* End of file mod_kriteria.php */
/* Location: ./application/models/mod_kriteria.php */