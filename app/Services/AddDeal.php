<?php
namespace App\Services;

use App\Services\GuzzleBase;

class AddDeal extends GuzzleBase {

    public $access_token;
	public $accountId;
	public $dealName;
	public $stage;

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
       return 'https://www.zohoapis.eu/crm/v2/Deals';
	}

	public function getParams() {
		return [
			'body' => json_encode([
				'data' => [
				[
					'Deal_Name' => $this->dealName,
					'Stage' => $this->stage,
					'Account_Name' => ['id' => $this->accountId]
				],
				]
			]),	
		];	
	}

}

?>
