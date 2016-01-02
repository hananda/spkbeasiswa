<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengumuman extends CI_Model {

	public function getData()
	{
		$dataorder = array();
        $dataorder[3] = "judul_pengumuman";

		$search = $this->input->post("search");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT * FROM master_pengumuman";
		if($search){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(UPPER(judul_pengumuman) LIKE '%". strtoupper($search['value']) ."%')";
		}
        // OR PROGRAM_TAHUN LIKE '%". strtolower($search) ."%'

		if($order){
            $query.= " order by 
                ".$dataorder[$order[0]["column"]]." ".$order[0]["dir"];
        }else{
        	$query .= "order by tgl_pengumuman desc";
        }

        $iTotalRecords = $this->db->query("SELECT COUNT(*) AS JUMLAH FROM (".$query.") A")->row()->JUMLAH;

        $query .= " LIMIT ". ($start) .",".(($start) + $iDisplayLength);

        $data = $this->db->query($query)->result_array();
        $i = 1;
        $result = array();
        foreach ($data as $d) {
            $r = array();
            if ($d['aktif_pengumuman'] == 'Y') {
            	$icon = 'fa-check';
            	$title = 'Non aktifkan';
            }else{
            	$icon = 'fa-times';
            	$title = 'aktifkan';
            }

			$r[0] = $d['id_pengumuman'];
			$r[1] = $i;
            $r[2] = '
				<a class="editData" data-id= "'. $d['id_pengumuman'] . '" >
					<i class="mgRg5 fa fa-pencil" title="Ubah"></i>
				</a>
                <a class="btnaktif" data-aktif="'.$d['aktif_pengumuman'].'" data-id= "'. $d['id_pengumuman'] . '" >
                    <i class="mgRg5 fa '.$icon.'" title="'.$title.'"></i>
                </a>
			';
			$r[3] = $d['judul_pengumuman'];
			// $r[4] = $d['bobot_pengumuman'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

    public function crud_pengumuman()
    {
        $result = array();
        $task = $this->input->post('task');
        $filter['id_pengumuman'] = $this->input->post('idpengumuman');
        $data['judul_pengumuman'] = $this->input->post('jdlpengumuman');
        $data['desc_pengumuman'] = $this->input->post('desc');
        switch ($task) {
            case 'tambah':
				$data['tgl_pengumuman']= date('Y-m-d');
                $this->db->insert('master_pengumuman', $data);
                break;
            case 'ubah':
                $this->db->where($filter);
                $this->db->update('master_pengumuman', $data);
                break;
            case 'hapus':
                $aktif = $this->input->post('aktif');
                if ($aktif == 'Y') {
                	$aktif = 'T';
                	$task = 'non aktifkan';
                }else{
                	$aktif = 'Y';
                	$task = 'aktifkan';
                }
                $data = array();
                $data['aktif_pengumuman'] = $aktif;
                $this->db->where($filter);
                $this->db->update('master_pengumuman',$data);
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

    public function getdesc()
    {
    	$id = $this->input->post('idpengumuman');
    	$result = $this->db->query("SELECT desc_pengumuman FROM master_pengumuman WHERE id_pengumuman = ".$id)->row_array();
    	return $result;
    }

}

/* End of file mod_pengumuman.php */
/* Location: ./application/models/mod_pengumuman.php */