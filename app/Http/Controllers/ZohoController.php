<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Oauth;
use App\Services\AddAccount;
use App\Services\AddDeal;
use App\Http\Requests\AddRequest;

class ZohoController extends Controller
{

    private $addDeal;
    private $addAccount;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AddAccount $addAccount, AddDeal $addDeal)
    {
        //$this->middleware('auth');
   
        $this->addAccount = $addAccount;
        $this->addDeal = $addDeal;
    }

    /**
     * Show the form-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, Oauth $oauth)
    {
        $oauthResult = json_decode($oauth->funcSend());                    

        return view('zoho.index', ['access_token' => $oauthResult->access_token]);
    }

    /**
     * Add a new account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actionAdd(AddRequest $request)
    {
        try {
            $resultAddAccount = json_decode($this->actionAddAccount($request));
            $resultAddDeal = json_decode($this->actionAddDeal($request, $resultAddAccount->data[0]->details->id)); //!?тут понимаю, что, вероятно, для нового deal нужен id нового account, но не смог найти соответствующее поле в deal
        } catch (Exception $exception) {
            return $exception;
        }   
    }  
    
    /**
     * Add a new account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function actionAddAccount(Request $request)
    {
        $this->addAccount->access_token = $request->access_token;
        $this->addAccount->accountName = $request->accountName;
        $this->addAccount->website = $request->website;
        $this->addAccount->phone = $request->phone;

        return $this->addAccount->funcSend();
    }  

    /**
     * Add a new deal.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function actionAddDeal(Request $request, $resultAddAccountId)
    {
        $this->addDeal->access_token = $request->access_token;
        $this->addDeal->accountId = $resultAddAccountId;
        $this->addDeal->dealName = $request->dealName;
        $this->addDeal->stage = $request->stage ;

        return $this->addDeal->funcSend();
    }     

}
