<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'password',
        'password_not_hashed',
        'fullName',
        'phone',
        'email',
        'city',
        'rebill_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function patients()
    {
        return $this->hasMany(Patient::class,'user_id','id');
    }
    public function biometrics()
    {
        return $this->hasOne(Biometrics::class,'user_id','id');
    }
    public function sidetwg()
    {
        return $this->hasOne(SideTWG::class,'user_id','id');
    }
    public function treatmentplanning()
    {
        return $this->hasOne(TreatmentPlanning::class,'user_id','id');
    }
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }


}
