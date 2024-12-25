<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{

    protected $fillable = [
        'fullName'
    ];

    public function user()
    {
    return $this->belongsTo(User::class,'user_id','id');
    }
    public function biometrics()
    {
        return $this->hasOne(Biometrics::class,'patient_id','id');
    }
    public function sideTwg()
    {
        return $this->hasOne(SideTWG::class,'patient_id','id');

    }
}
