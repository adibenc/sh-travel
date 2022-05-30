<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access
{
	public $user;
	/**
	* Constructor
	*/
	function __construct()
	{
		$this->CI =&get_instance();
		$auth = $this->CI->config->item('auth');
		
		$this->CI->load->helper('cookie');
		$this->CI->load->model('user_model');
		
		$this->user_model =& $this->CI->user_model;
	}
	
	/**
	* Cek login user
	*/
	function login($username,$password)
	{
		$result = $this->user_model->get_login_info($username);
		
		if($result)
		{
			$password = md5($password);
			if($password === $result->pswd)
			{
				$this->CI->session->set_userdata('user_id',$result->id_user);
				$this->CI->session->set_userdata('username',$result->usrname);
				$this->CI->session->set_userdata('nama_lengkap',$result->nama);
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
		return FALSE;
	}
	
	/**
	* isLogin?
	*/
	function is_login()
	{
		return (($this->CI->session->userdata('user_id')) ? TRUE : FALSE);
		//return true;
	}
	
	/**
	* Logout
	*/
	function logout()
	{
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama_lengkap');
	}
	
}

/* End of file access.php */
/* Location: ./application/libraries/access.php */