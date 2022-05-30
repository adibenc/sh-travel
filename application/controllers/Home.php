<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once("BaseController.php");

class Home extends BaseController {
	 
	function __construct() {
		parent:: __construct();
		//$this->current_db = $this->load->database('default',TRUE);
		$this->load->library('template');
		$this->load->model('WisataModel', 'wisata');
	}
	
	public function index() {
		$data["kdwisata"] = "kdwisata";
		$data["wisata"] = "wisata";
		$data["lokasi"] = "lokasi";
		$data["ket1"] = "ket1";
		$data["ket2"] = "ket2";
		$data["image"] = "image";
		$data["akses"] = "akses";
		$data["waktu"] = "waktu";
		$data["tiket"] = "tiket";
		$data["kategori"] = "kategori";
		$data["g1"] = "g1";
		$data["g2"] = "g2";
		$data["g3"] = "g3";
		$data["g4"] = "g4";

		$this->template->display('index', [
			"data" => $data
		]);
	}

	public function about() {
		$this->template->display('about');
	}

	public function recom() {
		$this->template->display('recom');
	}

	public function predictRecom() {
		try{
			self::success("Ok", [
				1,2,3
			]);
		}catch(\Exception $e){
			self::fail("Failed", $e->getMessage());
		}
	}

	public function byCategory($slug){
		$rslug = [
			"gunung" => 1,
			"goa" => 3,
			"pemandian" => 3,
			"taman" => 5,
			"candi" => 5,
			"kampung" => 6,
			
			"tongkrong" => 7,
		];
		$id = arrayGet($rslug, $slug);
		$data = $this->wisata->byCategory($id)->row_array();

		$this->template->display('detail', $data);
	}
	// byCategory($id)
}