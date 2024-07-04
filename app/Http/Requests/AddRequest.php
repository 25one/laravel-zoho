<?php

namespace App\Http\Requests;

class AddRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'accountName' => 'required', 
            'website' => 'required|url',
            'phone' => 'required|regex:/[0-9]{3}-[0-9]{2}-[0-9]{2}/',   
            'dealName' => 'required',   
            'stage' => 'required',          
        ];
    }   
}
