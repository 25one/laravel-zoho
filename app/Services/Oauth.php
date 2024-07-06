<?php
namespace App\Services;

use App\Services\GuzzleBase;

class Oauth extends GuzzleBase {

	public function getHeaders() {
		return [];
	}

	public function getMethod() {
		return 'POST';
	}

	public function getUrl() {
       return 'https://accounts.zoho.eu/oauth/v2/token';
	}

	public function getParams() {
        return [ 
			'form_params' => 
				[
					'refresh_token' => config('app.refresh_token'),
					'client_id' => '1000.O2HYGUVRXS8K1NONA95NHEAMEK70LP',
					'client_secret' => '542339ee1b0c99a90da1f3f33095624c201fc92d6c',
					'grant_type' => 'refresh_token',
					'redirect_uri' => 'https://crm.zoho.eu/crm/org20099698487',
				]
	    ];
	}

}

?>
