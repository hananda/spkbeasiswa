<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {

	public function registersubmit()
	{
		$fullname = trim($this->input->post('nl'));
		$username = trim($this->input->post('u'));
        $password = trim($this->input->post('p'));
        $result = array();
        /* Kondisi jika password salah */
            //echo 'Username atau password anda salah!';

        $password=md5($password);
        $this->db->where('username', $username);
        $cekifidexist = $this->db->get('master_user')->num_rows;

        if($cekifidexist){
        	$result['status'] = false;
        	$result['message'] = "User ID Telah tersedia";
	        $result['url'] = "";
        }else{
	        $data = array(
	            'username'=>$username,
	            'password'=>$password,
	            'nama_user'=>$fullname,
	            'tipe_user'=>3
	        );

	        $this->db->insert('master_user', $data);
	        $newid = $this->db->insert_id();
	        $this->db->insert('master_mahasiswa', array('id_user'=>$newid));

	        if($this->db->affected_rows()){
	        	$result['status'] = true;
	        	$result['message'] = "User Berhasil dibuat";
	        	$result['url'] = base_url()."login";
	        }else{
	        	$result['status'] = false;
	        	$result['message'] = "User Gagal dibuat";
	        	$result['url'] = "";
	        }
	    }
	    
	    return $result;
	}

}

/* End of file mod_user.php */
/* Location: ./application/models/mod_user.php */