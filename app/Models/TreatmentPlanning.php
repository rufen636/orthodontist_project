<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentPlanning extends Model
{
    protected $fillable=[
        'user_id',
        'patient_id',
        'deficit_a',
        'incisor_inclination_up',
        'value_3_3_vc',
        'value_4_4_vc',
        'value_5_5_vc',
        'value_6_6_vc',
        'distalization_i',
        'distalization_ii',
        'derotation_16',
        'derotation_26',
        'separation',
        'incisor_inclination_down',
        'value_3_3_nc',
        'value_4_4_nc',
        'value_5_5_nc',
        'value_6_6_nc',
        'distalization_iii',
        'distalization_iv',
        'separation_nc',
        'space_nc',
        'space_vc',
        'sepDown',
        'sepUp'
    ];

    protected $casts = [
        'upper_jaw_data' => 'array',
        'lower_jaw_data' => 'array',
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
