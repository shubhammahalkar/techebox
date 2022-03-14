<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSubSubCategory extends Model
{
    //

    protected $table = "attribute_subsubcategory";

    public function parent()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
