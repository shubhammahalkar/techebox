<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSubCategory extends Model
{
    //

    protected $table = "attribute_subcategory";

    public function parent()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
