<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidetwg extends Model
{
    protected $table = 'side_twg';
    protected $fillable = ['patient_id', 'image_path', 'calculations'];

    protected $casts = [
        'calculations' => 'array',
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
