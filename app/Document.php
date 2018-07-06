<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    /**
     * Stores a given Document Request.
     *
     * @param App\Http\Requests\DocumentsRequest $request
     *
     * @return App\Document
     */
    public static function storeRequest($request)
    {
        $file = $request->file('document_file');

        $name = time().$file->getClientOriginalName();

        $file->move('uploads/documents', $name);

        $data = $request->validated();

        $data['document_file'] = $name;

        return  static::create($data);
    }
}
