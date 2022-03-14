<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrontendUpdate extends Model
{
    use SoftDeletes;

    public function category() {
        return $this->belongsTo(FrontendUpdateCategory::class, 'category_id');
    }

}
