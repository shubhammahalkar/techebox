<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryGuideTitle extends Model
{
    protected $table = 'try_guide_title';
    public function Category(){
    	return $this->belongsTo(Category::class);
    }

    public function userTag(){
    	return $this->hasMany(UserTag::class);
    }

}
