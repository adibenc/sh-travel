<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(__DIR__.'/../BaseController.php');
include_once(__DIR__."/../../libraries/PidumPerkara.php");

// Pidum as proxy
class Pidum extends BaseController {
    function __construct() {
        parent::__construct();
		$p = new PidumPerkara();
		$p->useJsonHeader()->setBasicAuth(
            SecretConst::PIDUM_USER, SecretConst::PIDUM_PASSWORD
        );

		$this->pidum = $p;
    }

    function index(){
        self::success("ok", null);
    }
    
    function retrieveRekap(){
        $params = [
            "Tahun" => arrayGet($_GET, "tahun"),
            "JenisPidana" => arrayGet($_GET, "jpidana"),
            "JenisPerkara" => arrayGet($_GET, "jperkara"),
        ];
        // preout($params);
        $data = $this->pidum->retrieveRekap($params);
        self::success("ok", $data);
    }
    
    function retrieveRekapBySatker($satker){
        $params = [
            "Tahun" => arrayGet($_GET, "tahun"),
            "JenisPidana" => arrayGet($_GET, "jpidana"),
            "JenisPerkara" => arrayGet($_GET, "jperkara"),
        ];
        // preout($params);
        $data = $this->pidum->retrieveRekapBySatker($params, $satker);
        self::success("ok", $data);
    }
    
    function retrieveDaftarRekap(){
        $data = $this->pidum->retrieveDaftarRekap(
            arrayGet($_GET, "tahun"), 
            arrayGet($_GET, "jpidana"), 
            arrayGet($_GET, "jperkara"), 
            arrayGet($_GET, "id_kejati"), 
            arrayGet($_GET, "id_kejari"), 
            arrayGet($_GET, "id_cabjari")
        );
        
        self::success("ok", $data);
    }
    
    function retrieveAllStatistik(){
        $pl = [
            "Tahun" => arrayGet($_GET, "tahun"),
            "JenisPidana" => arrayGet($_GET, "jpidana"),
            "JenisPerkara" => arrayGet($_GET, "jperkara"),
        ];
        $berkas = $this->pidum->retrieveStatistikBerkas($pl);
        $tersangka = $this->pidum->retrieveStatistikUsiaTersangka($pl);
        
        self::success("ok", [
            "berkas" => $berkas,
            "tersangka" => $tersangka,
        ]);
    }

    function retrieveStatistikBerkas(){
        $data = $this->pidum->retrieveStatistikBerkas([
            "Tahun" => arrayGet($_GET, "tahun"),
            "JenisPidana" => arrayGet($_GET, "jpidana"),
            "JenisPerkara" => arrayGet($_GET, "jperkara"),
        ]);
        self::success("ok", $data);
    }
    
    function retrieveStatistikUsiaTersangka(){
        $data = $this->pidum->retrieveStatistikUsiaTersangka([
            "Tahun" => 2020,
            "JenisPidana" => 4,
            "JenisPerkara" => 4,
        ]);
        self::success("ok", $data);
    }
    
    function retrieveJenisPerkara(){
        $data = $this->pidum->retrieveJenisPerkara([
            "JenisPidana" => arrayGet($_GET, "jp"),
        ]);
        self::success("ok", $data);
    }

    function getPerkaraByKejari(){
        $data = $this->pidum->getPerkaraByKejari(
            // json_encode(
                [
            "Tahun" => arrayGet($_GET, "tahun"),
            "id_kejati" => arrayGet($_GET, "id_kejati"),
            "id_kejari" => arrayGet($_GET, "id_kejari"),
            "id_cabjari" => arrayGet($_GET, "id_cabjari"),
        ]);
        self::success("ok", $data);
    }

    function getPerkaraByKejati(){
        $data = $this->pidum->getPerkaraByKejati(
            // json_encode(
                [
            "Tahun" => arrayGet($_GET, "tahun"),
            "id_kejati" => arrayGet($_GET, "id_kejati"),
            "id_kejari" => arrayGet($_GET, "id_kejari"),
            "id_cabjari" => arrayGet($_GET, "id_cabjari"),
        ]);
        self::success("ok", $data);
    }

    function getTersangka(){
        $d = json_encode([
            "id" => arrayGet($_GET, "id"),
        ]);
        $data = $this->pidum->getTersangka($d);
        self::success("ok", $data);
    }

    public function getSatkerByKejati($kejati)
    {
        $query = "select * from dak_instansi where inst_parent <> '0' and ins_satkerkd like '$kejati%' ";
        
        $output = $this->db->query($query)->result_array();
        foreach ($output as $key => $value) {
            $output[$key]['encrypt'] = encode_url($value['ins_satkerkd']);
        }
        rest_response(200, $output);
    }
}