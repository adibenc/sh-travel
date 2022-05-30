<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

/////////////////////////Basic Script///////////////////////////////////

	public function get($table, $field = NULL, $id = NULL){
		if($id != NULL)
		{
			$this->db->where($field, $id);
		}
		return $this->db->get($table);

	}

	public function insert($table, $input, $field = NULL, $id = NULL)
	{
		if($id == NULL){
			$result = $this->db->insert($table,$input);
			$insert_id = $this->db->insert_id();
			return ($result) ? $insert_id : FALSE;
		} else {
			$this->db->where($field, $id);
			$result = $this->db->update($table,$input);
			return ($result) ? $id : FALSE;
		}
	}

	public function delete($table, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->delete($table);
	}

////////////////////////////////advance script////////////////////////////////////////////

	public function get_jaksa($id = NULL)
	{
		$this->db->or_where('id_kegiatan', $id);
		
		return $this->db->get('jaksa_ditunjuk');
	}	


}