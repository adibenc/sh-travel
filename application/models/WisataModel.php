<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once(__DIR__."/BaseModel.php");

class WisataModel extends BaseModel {
	
	public $table, $withSession = true;

	function byCategory($id) {
		$q = "SELECT * from tbwisata
			INNER JOIN tbkategori ON(tbwisata.kdkategori = tbkategori.kdkategori)
			INNER JOIN tbdetailwisata ON(tbwisata.kdwisata = tbdetailwisata.kdwisata)
			WHERE tbwisata.kdkategori = $id";
		return $this->db->query($q);
	}

	function allCafe() {
		$this->table = "tbtongkrongan";
		return $this->getMulti([]);
	}

	function cafeByCategory($id) {
		$q = "SELECT * from tbtongkrongan WHERE kdcafe=$id";
		return $this->db->query($q);
	}
}