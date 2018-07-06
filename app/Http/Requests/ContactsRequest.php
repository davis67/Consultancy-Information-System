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
            'name_title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'office_telephone' => 'required',
            'mobile_telephone' => 'required',
            'department' => 'required',
            'job-title' => 'required',
            'email' => 'required|email',
            'client_name' => 'required',
            'address_street' => 'nullable',
            'address_city' => 'required',
            'address_state' => 'required',
            'address_postal_code' => 'required',
            'address_country' => 'required',
            'alt_address_street' => 'nullable',
            'alt_address_city' => 'nullable',
            'alt_address_state' => 'nullable',
            'alt_postal_code' => 'nullable',
            'alt_address_country' => 'nullable',
            'description' => 'required',
            'assigned_to' => 'required',
        ];
    }
}
