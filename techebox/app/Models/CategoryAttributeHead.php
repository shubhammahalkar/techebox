<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class CategoryAttributeHead extends Model
{
    // protected $with = ['attribute_translations'];

    // public function getTranslation($field = '', $lang = false){
    //   $lang = $lang == false ? App::getLocale() : $lang;
    //   $attribute_translation = $this->attribute_translations->where('lang', $lang)->first();
    //   return $attribute_translation != null ? $attribute_translation->$field : $this->$field;
    // }

    public function attributes(){
      return $this->hasMany(CategoryAttribute::class);
    }

    // public function attribute_values() {
    //     return $this->hasMany(AttributeValue::class);
    // }

}
