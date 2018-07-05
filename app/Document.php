<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function getDocument_fileAttribute($document_file)
    {
        return asset($document_file);
    }
}
