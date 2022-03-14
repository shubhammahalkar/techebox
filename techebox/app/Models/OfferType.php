<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


}
