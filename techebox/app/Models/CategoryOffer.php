<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryOffer extends Model
{
    public function offer()
    {
        return $this->belongsTo(Offer::class,'offer_id');
    }


    public function bank_offers()
    {
        return $this->where('type_id',"=",1)->get();
    }
    public function company_offers()
    {
        return $this->where('type_id',"=",2)->get();
    }



}
