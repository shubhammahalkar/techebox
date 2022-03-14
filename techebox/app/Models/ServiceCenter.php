<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
