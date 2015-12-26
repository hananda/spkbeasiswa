<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_login extends CI_Model {

	function getLogin()
	{
		$username = trim($this->input->post('u'));
        $password = trim($this->input->post('p'));
        /* Kondisi jika password salah */
            //echo 'Username atau password anda salah!';

        $password=md5($password);

        $filter = array(
            'username'=>$username,
            'password'=>$password
        );
        $q=$this->db->get_where('master_user', $filter);
	
		return $q;
	}	

}

/* End of file login.php */
/* Location: ./application/models/login.php */