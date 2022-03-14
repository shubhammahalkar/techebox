<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class CustomerReplacementReason extends Model
{
    // protected $with = ['attribute_translations'];

    public function category()
    {
       return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
       return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function subsubcategory()
    {
       return $this->belongsTo(SubSubCategory::class,'subsubcategory_id');
    }





}
