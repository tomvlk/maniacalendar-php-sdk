<?php

namespace maniacalendar;

abstract class Client {
    private $apiBaseUrl = "http://api.maniacalendar.com/";
    private $apiVersion = "v1";
    private $apiUrl = "";
    
    private $apiKey = "";
    
    public function __construct($key) {
        $this->apiKey = $key;
        $this->apiUrl = $this->apiBaseUrl . $this->apiVersion . "/";
        
        if(!function_exists("curl_init")) {
            trigger_error("Install PHP Curl Extension!", E_USER_ERROR);
        }
        if(!function_exists("json_decode")) {
            trigger_error("Install PHP Json Extension!", E_USER_ERROR);
        }
    }
    
    /**
     * Execute API method
     * @param string $method Can be GET or POST
     * @param string $path The path to add to the API base url, without / on the begin.
     * @param array $parameters Array with parameters
     * @return boolean|object false on failure, object with response on success
     * @throws Exception
     */
    private function execute($method, $path, $parameters = array()) {
        $url = $this->apiUrl . $path;
        
        $data = http_build_query($parameters);
        $urldata = http_build_query(["key" => $this->apiKey]);
        
        $config = array();
        $header = array();
        
        if($method == 'GET') {
            $urldata = $urldata . "&" . $data;
        }
        
        $url = $url . "?" . $urldata;
        $options[CURLOPT_URL] = $url;
        
        $header["accept"] = "Accept: application/json";
        $header["content-type"] = "Content-type: application/json";
        
        if($method == 'POST') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }
        
        
        $options[CURLOPT_HEADER] = $header;
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_USERAGENT] = "maniacalendar-php-sdk";
        
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);
        $responseHeader = curl_getinfo($curl);
        $error = curl_error($curl);
        $errno = curl_erno($curl);
        
        curl_close($curl);
        
        
        // Check response http code
        if($responseHeader['http_code'] == 200) {
            // All ok! Return the response from server.
            return json_decode($response);
        }elseif($responseHeader['http_code'] == 403) {
            throw new Exception("You don't have access, please check your API Key and your Limit", $responseHeader['http_code']);
        }else{
            throw new Exception("Error with connecting to API server, CURL error", $errno);
        }
        
        return false;
    }
}
