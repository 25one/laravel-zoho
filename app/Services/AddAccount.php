<?php
namespace App\Services;

use App\Services\GuzzleBase;

class AddAccount extends GuzzleBase {

    public $access_token;
	public $accountName;
	public $website;
	public $phone;

	public function getHeaders() {
		return ['headers' => 
		    [
			   'Authorization' => 'Zoho-oauthtoken ' . $this->access_token,
			   'Content-Type' => 'application/json',
		    ]
		];	
	}

	public function getMethod() {
		return 'POST';
	}

	public function getUrl() {
       return 'https://www.zohoapis.eu/crm/v2/Accounts';
	}

	public function getParams() {
		return [
			'body' => json_encode([
				'data' => [
				[
					'Account_Name' => $this->accountName,
					'Website' => $this->website,
					'Phone' => $this->phone,
				],
				]
			]),	
		];	
	}

}

?>
