<?php

class Request {
    
        var $app_key = "";
        var $secret_key = ""; // Secret Key From Portal
	var $response_type = "json"; // xml / json / csv / html / php
	var $requiredSSL = false;
	var $endpoint = "localhost:8888/distributor/index.php/api";
	
        public function setAuth($appkey, $secretkey) {
		$this->app_key = $appkey;
		$this->secret_key = $secretkey;
	}
        
        public function setRequriedSSL($requried_ssl) {
		$this->requiredSSL = $requried_ssl == true;
	}
        
        public function getResponse($method, $params) {
		
		if ($this->requiredSSL == true) {
			$url = "https://" . $this->endpoint .'/'.$method;
		} else {
			$url = "http://" . $this->endpoint .'/'.$method;
		}
                
                if ($params !== null) {
                    //build additional URL string
                    
                        $uri = '?';
			$uri .= http_build_query($params);
                        
                        $url = $url.$uri;
		}
                
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array(
                    'API-KEY:'.$this->app_key,
                    'API-SECRET-KEY:'.$this->secret_key
                ));
		curl_setopt ( $ch, CURLOPT_VERBOSE, 1 ); // OUTPUT VERBOSE INFORMATION
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); // RETURN AS A STRING
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 ); // SSL VERIFICATION
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 ); // SSL VERIFICATION
		curl_setopt ( $ch, CURLOPT_FAILONERROR, 0 );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		$returned = curl_exec ( $ch );
		
		curl_close ( $ch );
                
		$response = json_decode ( $returned );
		
                return $response;
                
             
	
	}
        

}