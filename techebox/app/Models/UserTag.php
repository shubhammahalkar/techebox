<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class UserTag extends Model
{
    // protected $with = ['attribute_translations'];

    // public function getTranslation($field = '', $lang = false){
    //   $lang = $lang == false ? App::getLocale() : $lang;
    //   $attribute_translation = $this->attribute_translations->where('lang', $lang)->first();
    //   return $attribute_translation != null ? $attribute_translation->$field : $this->$field;
    // }

    public function category(){
      return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory(){
      return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function subsubcategory(){
      return $this->belongsTo(SubSubCategory::class,'subsubcategory_id');
    }


    // public function attribute_values() {
    //     return $this->hasMany(AttributeValue::class);
    // }

}
