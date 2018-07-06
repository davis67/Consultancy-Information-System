<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
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
            'document_file' => 'required|max:100000|mimes:doc,pdf,docx,odt,zip',
            'status' => 'required',
            'document_name' => 'required',
            'revision' => 'required',
            'publish_date' => 'required',
            'expiration_date' => 'required',
            'team' => 'required',
            'category' => 'required',
            'description' => 'nullable',
            'assigned_to' => 'required',
        ];
    }
}
