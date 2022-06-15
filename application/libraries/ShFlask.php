<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once(__DIR__ . "/BaseApiClient.php");

/**
 * 
 * @adib-enc
 * 
 * requires :
 * - SimpleHTTPClient : https://github.com/ekillaby/simple-http-client
 * - BaseApiClient : todo
 * 
 * 
 * requires BaseApiClient
 */

class ShFlask extends BaseApiClient
{
    protected $_ci;

    protected $BASE_URL_DEV = "http://localhost:5000";
    protected $BASE_URL_PROD = "http://localhost:5000";

    protected $USE_REMOTE_FILE_STORAGE = true;

    //endpoints / methods
    const URI_PREDICT = "/predict";

    // to do : Basic auth header

    function setDefaultHttpClient() {
        $client = new SimpleHTTPClient();
        $client->setVerifySSL(false);
        $client::$TIMEOUT = 60;

        $this->setHttpClient($client);
        return $this;
    }

    function decode($p)
    {
        return json_decode($p);
    }

    function postAndDecode($url, $data) {
        $ret = $this->post($url, $data);
        $r = $this->decode($ret['body']);
        // preout($url);
        // preout($ret);
        // preout($data);
        // preout($r);
        $this->logs($url, false, false);
        $this->logs($data);
        $this->logs($this->getHttpClient(), true, true);
        $this->logs($ret, true, true);
        $this->logs($r, true, true);

        return $r;
    }

    function getAndDecode($url, $data) {
        $ret = $this->get($url, $data);
        $r = $this->decode($ret['body']);
        // preout($url);
        // preout($ret);
        // preout($data);
        // preout($r);
        $this->logs($url, false, false);
        $this->logs($data);
        $this->logs($this->getHttpClient(), true, true);
        $this->logs($ret, true, true);
        $this->logs($r, true, true);

        return $r;
    }

    function predict($umur, $status, $rombongan, $hobi){
        $qparam = http_build_query([
            "umur" => $umur, 
            "status" => $status, 
            "rombongan" => $rombongan, 
            "hobi" => $hobi
        ]);
        $url = $this->getUrl() . self::URI_PREDICT . "?$qparam";

        $d = $this->getAndDecode($url, null);
        return $d;
    }
}
