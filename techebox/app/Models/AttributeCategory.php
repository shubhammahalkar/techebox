<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{
    //

    protected $table = "attribute_category";

    public function parent()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
