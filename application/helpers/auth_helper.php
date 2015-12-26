<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in()
{
	$CI =& get_instance();
    $logintime = $CI->session->userdata("login_time");
    $username = $CI->session->userdata("user_name");

    if(!isset($username) || $username == "")
    {
        redirect(base_url().'login');
    } 

	return true;
}
