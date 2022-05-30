<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_model
{
	public $table			= 'dt_users';

	function __construct()
	{
		parent:: __construct();
	}
	
	function get_login_info($username)
	{
		$qry = "
			select * from dt_users
			where usrname =  ?
			";
		$query = $this->db->query($qry, array($username));
		return ($query->num_rows() > 0) ? $query->row() : FALSE;
	}
	
	function get_password($id)
	{
		$this->db->where('id',$id);
		
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return ($query->num_rows() > 0) ? $query->row() : FALSE;
	}
	
	function change_password($id, $pass)
	{
		$this->db->where('id',$id);
		return $this->db->update($this->table, array('password' => $pass)); 
	}

}