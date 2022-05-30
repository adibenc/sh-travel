<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class WisataModel extends CI_model {
	
	public $table, $withSession = true;

	function byCategory($id) {
		$q = "SELECT * from tbwisata
			INNER JOIN tbkategori ON(tbwisata.kdkategori = tbkategori.kdkategori)
			INNER JOIN tbdetailwisata ON(tbwisata.kdwisata = tbdetailwisata.kdwisata)
			WHERE tbwisata.kdkategori = $id";
		return $this->db->query($q);
	}
}