<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biometrics extends Model
{
    protected $fillable = [
        'tonIndex',
        'adjustmentUpper',
        'adjustmentLower',
        'ponWidth_14_24',
        'ponWidth_16_26',
        'ponWidth_44_34',
        'ponWidth_46_36',
        'user_id',
        'patient_id',
        'leading_edge_length1',
        'leading_edge_length2',
        'segment1',
        'segment2',
        'segment3',
        'segment4',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
