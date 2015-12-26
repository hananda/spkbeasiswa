<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_penerimabeasiswa extends CI_Model {

    public function getData()
    {
        $user_id = $this->session->userdata('user_id');
        $dataorder = array();
        $dataorder[2] = "nim_mahasiswa";
        $dataorder[3] = "nama_mahasiswa";

        $search = $this->input->post("search");
        $periode = $this->input->post("periode");

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
                WHERE id_status = 2
                ";
        $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
        $query .= "tp.id_transaksi_beasiswa = ".$periode;
        

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
            $r[0] = $d['id_transaksi_pendaftaran'];
            $r[1] = $i;
            $r[2] = $d['nim_mahasiswa'];
            $r[3] = $d['nama_mahasiswa'];
            $r[4] = $d['nama_beasiswa']." Periode ".$d['tgl_awal_beasiswa']. " - ".$d['tgl_akhir_beasiswa'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
    }

	public function getDataranking()
	{
		$user_id = $this->session->userdata('user_id');

        $search = $this->input->post("search");
		$periode = $this->input->post("periode");

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $start = intval($_REQUEST['start']);
        $order = $this->input->post('order');

		$query = "SELECT *
                FROM view_ranking
				";
        $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
        $query .= "id_transaksi_beasiswa = ".$periode;
        

		if($search['value'] != ""){
            $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
			$query .= "(nama_jurusan = '". $search['value'] ."'
				 OR nama_jurusan = '". $search['value'] ."')";
		}
        // OR PROGRAM_TAHUN LIKE '%". strtolower($search) ."%'

		// if($order){
  //           $query.= " order by 
  //               ".$dataorder[$order[0]["column"]]." ".$order[0]["dir"];
  //       }

        $iTotalRecords = $this->db->query("SELECT COUNT(*) AS JUMLAH FROM (".$query.") A")->row()->JUMLAH;

        $query .= " LIMIT ". ($start) .",".(($start) + $iDisplayLength);
        
        $data = $this->db->query($query)->result_array();
        $i = 1;
        $result = array();
        foreach ($data as $d) {
            $r = array();
			$r[0] = $d['nim_mahasiswa'];
            $r[1] = $d['nama_mahasiswa'];
            $r[2] = $d['nama_beasiswa']." Periode ".$d['tgl_awal_beasiswa']. " - ".$d['tgl_akhir_beasiswa'];
			$r[3] = $i;
			$r[4] = $d['nilai_akhir'];
            array_push($result, $r);
            $i++;
        }

        $records["data"] = $result;
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return $records;
	}

    public function getAlternatifbyPeriode($idperiode = 0)
    {
        $result = array();
        $arralternatif = array();
        $arrkriteria = array();
        $arrperbandingan = array();
        $arrhasilakhir = array();
        $urutanalternatif = 0;

        $sqlalternatif = "select id_transaksi_pendaftaran from transaksi_pendaftaran where id_status = 2 and id_transaksi_beasiswa = ".$idperiode;
        $sqlkriteria = "select id_kriteria from master_kriteria";
        $sqltransaksikriteria = "select * from view_kriteria_pendaftaran where id_transaksi_beasiswa = ".$idperiode;
        $queryalternatif = $this->db->query($sqlalternatif);
        $querykriteria = $this->db->query($sqlkriteria);
        $querytransaksikriteria = $this->db->query($sqltransaksikriteria)->result();
        
        //proses ambil alternatif yang tersedia pada periode yang terpilih
        if ($queryalternatif->num_rows > 0) {
            foreach ($queryalternatif->result() as $r) {
                // array_push($arralternatif, $r->id_transaksi_pendaftaran);
                $arralternatif[$r->id_transaksi_pendaftaran] = array();
                // $urutanalternatif++;
            }
        }else
        {
            $result['msg'] = "System tidak memiliki alternatif pendukung SPK !";
            $result['status'] = false;
            return $result;
        }

        // proses ambil kriteria spk yang ada pada system
        if($querykriteria->num_rows > 0){
            foreach ($querykriteria->result() as $r) {
                array_push($arrkriteria, $r->id_kriteria);
            }
        }else{
            $result['msg'] = "System tidak memiliki kriteria pendukung SPK !";
            $result['status'] = false;
            return $result;
        }

        // mengambil bobot setiap kriteria pada masing masing alternatif
        foreach ($arralternatif as $index => $val) { 
            for ($j=0; $j < count($arrkriteria); $j++) { 
                foreach ($querytransaksikriteria as $r) {
                    if($r->id_kriteria == $arrkriteria[$j] && $r->id_transaksi_pendaftaran == $index)
                    {
                        array_push($arralternatif[$index], $r->bobot_detail_kriteria);
                        break;
                    }
                }
            }
        }

        // inisialisasi tempat nilai leavingflow dan enteringflow pada masing masing alternatif
        foreach ($arralternatif as $alternatif => $bobot) {
            $arrperbandingan[$alternatif]["leavingflow"] = array();
            $arrperbandingan[$alternatif]["enteringflow"] = array(); 
        }


        //menghitung perbandingan kriteria antar masing masing alternatif
        foreach ($arralternatif as $alternatif => $bobot) {
            
            foreach ($arralternatif as $alternatif1 => $bobot1) {
                if($alternatif == $alternatif1)
                    continue;

                $jumlahperbandingankriteria = 0;
                for ($i=0; $i < count($arrkriteria); $i++) { 
                    $hitung = $bobot[$i] - $bobot1[$i];
                    if($hitung > 0)
                        $hasil = 1;
                    else if($hitung <= 0)
                        $hasil = 0;
                    $jumlahperbandingankriteria += $hasil;
                }
                $nilaiakhir = $jumlahperbandingankriteria / count($arrkriteria);
                array_push($arrperbandingan[$alternatif]["leavingflow"],$nilaiakhir);
                array_push($arrperbandingan[$alternatif1]["enteringflow"],$nilaiakhir);
            } 
        }

        //menghitung hasil akhir / net flow melalui rumus leaving flow - entering flow
        foreach ($arrperbandingan as $alternatif => $lev_ent) {
            $sumlev = array_sum($lev_ent["leavingflow"]);
            $sument = array_sum($lev_ent["enteringflow"]);
            $pembagi = (count($arralternatif) - 1);
            $leavingflow = $sumlev / $pembagi;
            $enteringflow = $sument / $pembagi;
            $netflow = $leavingflow - $enteringflow;
            $arrhasilakhir[$alternatif] = $netflow;
        }

        // setelah mendapat hasil akhir, insert ke database tabel ranking
        $this->db->query("DELETE FROM ranking WHERE id_transaksi_beasiswa = ".$idperiode);
        foreach ($arrhasilakhir as $alternatif => $netflow) {
            $data = array();
            $data['id_transaksi_beasiswa'] = $idperiode;
            $data['id_transaksi_pendaftaran'] = $alternatif;
            $data['nilai_akhir'] = $netflow;
            $this->db->insert('ranking', $data);
        }

        // var_dump($arralternatif);
        // var_dump($arrkriteria);
        // var_dump($arrperbandingan);
        // var_dump($arrhasilakhir);
        $result['msg'] = "Perhitungan SPK Beasiswa dengan metode promete berhasil dilakukan";
        $result['status'] = true;
        return $result;
    }

    public function setujuibeasiswa($idperiode = 0)
    {
        $result = array();
        $query = "SELECT *
                FROM view_ranking
                ";
        $query .=preg_match("/WHERE/i",$query)? " AND ":" WHERE ";
        $query .= "id_transaksi_beasiswa = ".$idperiode;
        $dataranking = $this->db->query($query);
        if ($dataranking->num_rows > 0) {
            $rank = 1;
            $batasranking = 8;
            $status = 4;
            foreach ($dataranking->result() as $r) {
                if ($rank > $batasranking) {
                    $status = 5;
                }
                $this->db->query("UPDATE transaksi_pendaftaran SET ranking_spk = ".$rank++.",id_status=".$status." WHERE id_transaksi_pendaftaran = ".$r->id_transaksi_pendaftaran);
            }
            $this->db->where('id_transaksi_beasiswa', $idperiode);
            $this->db->delete('ranking');
            $result['msg'] = "keputusan berhasil disetujui";
            $result['status'] = true;
        }else{
            $result['msg'] = "Tidak ada data";
            $result['status'] = false;
        }
        return $result;
    }

}

/* End of file mod_penerimabeasiswa.php */
/* Location: ./application/models/mod_penerimabeasiswa.php */