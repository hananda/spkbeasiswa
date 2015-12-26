<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_user');
	}

	public function registersubmit()
	{
		$result = $this->mod_user->registersubmit();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}

/* End of file con_user.php */
/* Location: ./application/controllers/con_user.php */