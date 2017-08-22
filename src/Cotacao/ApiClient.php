<?php 

namespace Cotacao;

class ApiClient {

	private $url;

	public function __construct($url)
	{
		$this->url = $url;
	}
	
	public function getData()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $this->url,
		    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT x.y; Win64; x64; rv:10.0) Gecko/20100101 Firefox/10.0',
			CURLOPT_CONNECTTIMEOUT  => 0
		));
		$str = curl_exec($curl);
		curl_close($curl);
		return $str;
	}

}