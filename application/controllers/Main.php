<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(__DIR__."/../libraries/PidumPerkara.php");

class Main extends CI_Controller {
	 
	function __construct() {
		parent:: __construct();
		//$this->current_db = $this->load->database('default',TRUE);
		$this->load->library('template');
	}
	
	public function index() {
		$this->template->display('peta');
	}
}