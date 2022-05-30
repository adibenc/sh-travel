<?php

class LoggerModel extends CI_Model{
    private $enabled = true;
    
    public function __construct(){
        $this->enabled = SecretConst::APP_LOGGER;
    }

    public function logs($type = "", $data = null){
        $isEnabled = $this->getEnabled();
        if(!$isEnabled){
            return null;
        }
        $ret = null;
        $msg = "";
        $encoded = json_encode($data);
		switch($type){
            case "api-main":
                $this->logger->setFilename("api-main.log");
                $encoded = $data;
                $msg = "";
			break;
            case "sprint-api":
                $this->logger->setFilename("sprint-api.log");
                $encoded = $data;
                $msg = "sprint-api ";
			break;
            case "bri-api":
                $this->logger->setFilename("bri-api.log");
                $encoded = $data;
                $msg = "bri-api ";
			break;
        }
        
        try{
            $ret = @$this->logger->info($msg.$encoded);
        }catch(\Exception $e){
            $ret = @$this->logger->info("Logger exception : ".$e->getMessage());
        }

        return $ret;
	}
 
	public function getEnabled(){
		return $this->enabled;
	}

	public function setEnabled($enabled){
		$this->enabled = $enabled;

		return $this;
    }
    
	public function enable(){
		return $this->setEnabled(true);
    }
    
	public function disable(){
		return $this->setEnabled(false);
	}
}