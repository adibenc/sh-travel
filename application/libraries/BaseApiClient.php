<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(__DIR__."/SimpleHTTPClient.php");

/**
 * 
 * @adib-enc
 * 
 * requires :
 * - SimpleHTTPClient : https://github.com/ekillaby/simple-http-client
 * 
 * requires arrayGet
 */

if (!function_exists('arrayGet')) {
    function arrayGet($array, $key, $default = NULL)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}

class BaseApiClient{
    protected $_ci;
    protected $logfname = "api-main";

    const BASE_URL_DEV = "http://localhost/api";
    const BASE_URL_PROD = "http://localhost/api";

    protected $BASE_URL_DEV = "http://localhost/api";
    protected $BASE_URL_PROD = "http://localhost/api";
    
    //endpoints / methods
    // *_P = *_PERKARA
    const URI_ENDPOINT = "/";

    protected $header = [];
    public $response;
    public $httpClient;

	function __construct($client = null){
        if ( empty($client)){
            $this->setDefaultHttpClient();
        }
        $this->_ci =&get_instance();
        $this->_ci->load->model('LoggerModel', 'mlogger');
        $this->setEnv("dev");
    }

    function setDefaultHttpClient(){
        $this->setHttpClient(new SimpleHTTPClient());
        return $this;
    }

    function setEnv($env){
        $this->env = $env;
        return $this;
    }

	function getEnv(){
        return $this->env;
    }

	function getUrl($withSuffix = true){
        $env = $this->getEnv();
        $url = "";
        if($env == "prod"){
            // $url = self::BASE_URL_PROD;
            $url = $this->BASE_URL_PROD;
        }else if($env == "dev"){
            // $url = self::BASE_URL_DEV;
            $url = $this->BASE_URL_DEV;
        }
        
        return $url;
    }

	protected function post($url = "", $payload = ""){
        $client = $this->getHttpClient();
        $header = $this->getHeader();

        $ret = $client->post($url, $payload, $header);

        return $ret;
    }

	protected function get($url = "", $payload = ""){
        $client = $this->getHttpClient();

        $ret = $client->get($url, $payload);

        return $ret;
    }

    function test(){
        $url = $this->getUrl();
        $ret = $this->get($url);

        return $ret['body'];
    }

    function decode($p){
        $ret = json_decode($p);
        if( empty($ret) ){
            throw new \Exception("Json return invalid");
        }
        return $ret;
    }
 
	public function getHeader(){
		return $this->header;
	}

	public function setHeader($header){
		$this->header = $header;

		return $this;
	}

    public function addHeader($header){
		$this->header[] = $header;

		return $this;
	}

	public function getHttpClient(){
		return $this->httpClient;
	}

	public function setHttpClient($httpClient){
		$this->httpClient = $httpClient;

		return $this;
	}

    public function setBasicAuth($user, $pass){
        $cred = base64_encode($user).":".base64_encode($pass);
        $this->addHeader("Authorization: Basic ".$cred);

        return $this;
    }
    
    public function useJsonHeader(){
        $this->addHeader("Content-Type: application/json");

        return $this;
    }

    protected function logs($data, $pretty = true, $encode = true){
        
        if($encode && $pretty){
            if( is_string($data) ){
                $data = json_encode(
                    json_decode($data),
                    JSON_PRETTY_PRINT
                );
            }else{
                $data = json_encode(
                    $data,
                    JSON_PRETTY_PRINT
                );
            }
        }else{
            $data = json_encode($data);
        }

        $this->_ci->mlogger->logs($this->logfname, $data);
    }
}