<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'age',
        'sex',
        'address',
        'phone_number',
        'id_verify',
        'email',
        'password',
        'role',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationship sa client ug sa petinfo
    public function petInfo(){
        return $this->hasMany(PetInfo::class, 'owner_id');
    }

    public function service(){
        return $this->hasMany(Service::class, 'user_id');
    }

    public function request(){
        return $this->hasMany(RequestTrainer::class, 'user_id');
    }
}
