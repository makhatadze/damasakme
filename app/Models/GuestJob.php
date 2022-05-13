<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestJob extends Model
{
    use HasFactory;


    public function job(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Job::class,'id','job_id');
    }
}
