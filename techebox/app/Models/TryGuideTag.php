<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryGuideTag extends Model
{
    public function user_tag(){
        return $this->BelongsTo(UserTag::class);
    }

}
