<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_detailkriteria extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "id_kriteria";
        $dataorder[5] = "nama_detail_kriteria";
        $dataorder[4] = "nama_kriteria";
        $dataorder[6] = "bobot_detail_kriteria";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT master_detail_kriteria.*,nama_kriteria 
				FROM master_detail_kriteria
				JOIN master_kriteria ON master_kriteria.id_kriteria = master_detail_kriteria.id_kriteria";
		if($search['value']){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(UPPER(nama_detail_kriteria) LIKE '%". strtoupper($search['value']) ."%')";
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
			$r[0] = $d['id_detail_kriteria'];
			$r[1] = $d['id_kriteria'];
			$r[2] = $i;
            $r[3] = '
				<a id="editData" data-id= "'. $d['id_detail_kriteria'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a id="deleteData" data-id= "'. $d['id_detail_kriteria'] . '" >
                    <i class="mgRg5 fa fa-trash-o" title="Hapus"></i>
                </a>
			';
			$r[4] = $d['nama_kriteria'];
			$r[5] = $d['nama_detail_kriteria'];
			$r[6] = $d['bobot_detail_kriteria'];
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
        $filter['id_detail_kriteria'] = $this->input->post('id_detail_kriteria');
        $data['id_kriteria'] = $this->input->post('idkriteria');
        $data['nama_detail_kriteria'] = $this->input->post('nmdetilkriteria');
        $data['bobot_detail_kriteria'] = $this->input->post('btdetilkriteria');
        switch ($task) {
            case 'tambah':
                $this->db->insert('master_detail_kriteria', $data);
                break;
            case 'ubah':
                $this->db->where($filter);
                $this->db->update('master_detail_kriteria', $data);
                break;
            case 'hapus':
                $this->db->where($filter);
                $this->db->delete('master_detail_kriteria');
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

/* End of file mod_detailkriteria.php */
/* Location: ./application/models/mod_detailkriteria.php */