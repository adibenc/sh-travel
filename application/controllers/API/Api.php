<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	 
	function __construct()
	{
		parent:: __construct();
		$this->load->library('access');
		$this->load->library('template');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('db_model');
	}

	public function get_single_app($id){
		$output = $this->db_model->get('dt_apps','id_app',$id)->row_array();
		rest_response(200,$output);
	}

	public function get_coord($tahun = 2021, $jenis= ''){
		$coord = array();
		$radius = 0;
		$query = "
		select 
		FLOOR(RAND()*(50000-3000+1))+3000 as radius, 
		FLOOR(RAND()*(10-1+1))+1 as jenis, 
		lat_dec, 
		long_dec 
		from pengadilan_negeri
		";
		
		$output = $this->db->query($query)->result_array();
		foreach($output as $key => $value){
			$circle[$key] = array(
				"radius" => $value['radius'],
				"jenis" => $value['jenis'],
				"coord" => array(
					"long" => $value['long_dec'],
					"lat" => $value['lat_dec'],
				)
			);
			
			
		} 

		rest_response(200,$circle);
	}

	


}
