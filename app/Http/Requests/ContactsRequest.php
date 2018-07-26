<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'organisation_name'=>'required',
           'country'=>'required',
           'company_email'=>'required',
           'address_street'=>'required',
           'address_city'=>'required',
           'address_state'=>'required',
           'address_postal_code'=>'required',
           'address_country'=>'required',
           'alt_address_street'=>'required',
           'alt_address_city'=>'required',
           'alt_address_state'=>'required',
           'alt_postal_code'=>'required',
           'alt_address_country'=>'required',
           'description'=>'required',
           'office_telephone'=>'required',
           'mobile_telephone'=>'required',
           'contactperson_name'=>'required',
           'job_title'=>'required',
           'email'=>'required',
           'department'=>'required'
        ];
    }
}
