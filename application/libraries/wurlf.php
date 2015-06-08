<?php
require_once ("application/third_party/src/autoload.php");

class wurlf{

	public function __construct()
	{ 
		 			
	}

	public function getBrandName(){	
		// Create a configuration object 
		$config = new ScientiaMobile\WurflCloud\Config();
		// Set your WURFL Cloud API Key 
		$config->api_key = '227093:sGFS27UhTvDzAZIr6KQlBkJoWgpy91nd';
		// Create the WURFL Cloud Client 
		$client = new ScientiaMobile\WurflCloud\Client($config);
		// Detect your device 
		$client->detectDevice();
		return $client->getDeviceCapability('brand_name');
	}

	public function getModelName(){
		// Create a configuration object 
		$config = new ScientiaMobile\WurflCloud\Config();
		// Set your WURFL Cloud API Key 
		$config->api_key = '227093:sGFS27UhTvDzAZIr6KQlBkJoWgpy91nd';
		// Create the WURFL Cloud Client 
		$client = new ScientiaMobile\WurflCloud\Client($config);
		// Detect your device 
		$client->detectDevice();
		return $client->getDeviceCapability('model_name');
	}
}
?>