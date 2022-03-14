<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class SubCategory extends Model
{
    // protected $with = ['category_translations'];

    // public function getTranslation($field = '', $lang = false){
    //     $lang = $lang == false ? App::getLocale() : $lang;
    //     $category_translation = $this->category_translations->where('lang', $lang)->first();
    //     return $category_translation != null ? $category_translation->$field : $this->$field;
    // }

    // public function category_translations(){
    // 	return $this->hasMany(CategoryTranslation::class);
    // }

    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function classified_products(){
    	return $this->hasMany(CustomerProduct::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attributes()
    {
        return $this->hasMany(AttributeSubCategory::class);
    }






}
