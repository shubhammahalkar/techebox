<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function offer_type()
    {
        return $this->belongsTo(OfferType::class,'type_id');
    }

    public function bank_offers()
    {
        return $this->where('type_id',"=",1)->get();
    }
    public function company_offers()
    {
        return $this->where('type_id',"=",2)->get();
    }
    public function emi_offers()
    {
        return $this->where('type_id',"=",3)->get();
    }



}
