<?php
namespace App\Services;

abstract class GuzzleBase {

    abstract function getHeaders();

    abstract function getMethod();

	abstract function getUrl();

	abstract function getParams();

	public function funcSend() {
	    $client = new \GuzzleHttp\Client($this->getHeaders());
	    $response = $client->request($this->getMethod(), $this->getUrl(), $this->getParams());

	    return $response->getBody()->getContents();
	}

}

?>
