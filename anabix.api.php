<?php
class Anabix {
	public $user = "";
	public $token = "";
	public $api = "";

	public function request($type, $method, $data=array()) {

		if($this->user=="" || $this->token=="" || $this->api=="") return null;

		$requestData['username'] = $this->user;
		$requestData['token'] = $this->token;
		$requestData['requestType'] = $type;
		$requestData['requestMethod'] = $method;
		$requestData['data'] = $data;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('json' => json_encode($requestData)));
		
		$json = curl_exec($ch);
		$resultAnabix = json_decode($json, true);

		curl_close($ch);

		return $resultAnabix;
	}
}
