<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_login');
	}

	public function index()
	{
        $username = $this->session->userdata("user_name");
        if($username != "")
        {
            redirect(base_url().'home');
        } 
		$data = array();
		$this->load->view('viewLogin', $data, FALSE);
	}

    public function register()
    {
        $data = array();
        $this->load->view('viewRegister', $data, FALSE);
    }

	public function validateLogin()
	{
        $url = base_url().'home';
		$q=$this->mod_login->getLogin();

        if($q->num_rows() > 0){
            $data_user = $q->row();
            if ($data_user->aktif_user == 'T') {
                $output = array(
                    'status' => false,
                    'message' => 'User telah dinonaktifkan', 
                );
            }else{
                //setting session terhadap data user
                $newdata = array(
                            'login_time' => time(),
                            'user_id'   => $data_user->id_user,
                            'user_name'      => $data_user->username,
                            'user_nama'  => $data_user->nama_user,
                            'user_tipe'    => $data_user->tipe_user,
                            ); 

                // if($data_user->tipe_user == 3)
                //     $url = base_url()."datapribadi";

                $this->session->set_userdata($newdata);
                $output = array(
                    'status' => true,
                    'message' => '',
                    'url'=> $url, 
                );
                $_SESSION['user_id'] = $data_user->id_user;
            }
		}else{
			$output = array(
                'status' => false,
                'message' => 'Username dan password salah', 
            );
		}
        $this->output->set_content_type('application/json')->set_output(json_encode($output ));
	}

	public function logout()
	{
		$this->session->sess_destroy(); 
        $output = array(
                'url'=> base_url().'login', 
            );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */