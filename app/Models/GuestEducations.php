<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GuestEducations extends Model
{
    use HasFactory;


    /**
     * @return HasOne
     */
    public function degree(): HasOne
    {
        return $this->hasOne(Degree::class,'id','education_id');
    }
}
