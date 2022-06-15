<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once("BaseController.php");
include_once(__DIR__."/../libraries/NeuralNetwork.php");

class Home extends BaseController {
	public $modelPath = "C:/xampp2/htdocs/sh-travel/application/libraries/dummy-2022-05-31-model-nn-wisata";
	
	public $games = [
		"panah", "labirin", "paintball", "ffox", "tamankelinci", "atv", "sepeda"
	];

	public $labelMap = [
		"1000000000000000000" => "0000000",
		"0100000000000000000" => "0000010",
		"0010000000000000000" => "0000100",
		"0001000000000000000" => "0001000",
		"0000100000000000000" => "0100000",
		"0000010000000000000" => "0100100",
		"0000001000000000000" => "0101000",
		"0000000100000000000" => "0110000",
		"0000000010000000000" => "0111000",
		"0000000001000000000" => "1001000",
		"0000000000100000000" => "1001100",
		"0000000000010000000" => "1010010",
		"0000000000001000000" => "1100000",
		"0000000000000100000" => "1101000",
		"0000000000000010000" => "1101001",
		"0000000000000001000" => "1110000",
		"0000000000000000100" => "1110001",
		"0000000000000000010" => "1111000",
		"0000000000000000001" => "1111001",
	];
	
	function __construct() {
		parent:: __construct();
		//$this->current_db = $this->load->database('default',TRUE);
		$this->load->library('template');
		$this->load->model('WisataModel', 'wisata');
		$this->load->library('ShFlask', 'shflask');
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

	public function mapGames($str) {
		$ex = str_split($str);
		$game = $this->games;
		$ret = array_map(function($e, $i) use ($game) {
			// preout([$e, $i]);
			return $e == "1" ? $game[$i] : "";
		}, $ex, array_keys($ex));
		
		return $ret;
	}

	public function predictRecom() {
		try{
			$posts = $this->posts();
			$predict = $this->shflask->predict(
				$posts['umur'],
				$posts['status'],
				$posts['rombongan'],
				$posts['hobi'],
			);

			self::success("Ok", $predict ? $predict->data : null );
		}catch(\Exception $e){
			self::fail("Failed", $e->getMessage());
		}
	}

	public function byCategory($slug){
		$rslug = [
			"gunung" => 1,
			"air-terjun" => 2,
			"goa" => 3,
			"pemandian" => 4,
			"taman" => 5,
			"candi" => 6,
			"kampung" => 7,
			"tongkrong" => 8,
		];

		if($slug == "tongkrong"){
			$data = $this->wisata->allCafe();
			$this->template->display('detail-cafe', [
				'cafes' => $data
			]);
			return;
		}
		$id = arrayGet($rslug, $slug);
		$data = $this->wisata->byCategory($id)->row_array();

		$this->template->display('detail', $data);
	}
	// byCategory($id)
}