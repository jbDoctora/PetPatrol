<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'sex',
        'address',
        'phone_number',
        'id_verify',
        'email',
        'password',
        'role',
        'gcash_qr',
        'gcash_number',
        'profile_photo',
        'admin_approve',
        'completedBooking',
        'isBanned',
        'avg_rating',
        'trainer_document',
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
    public function petInfo()
    {
        return $this->hasMany(PetInfo::class, 'owner_id');
    }

    public function service()
    {
        return $this->hasMany(Service::class, 'user_id');
    }

    public function request()
    {
        return $this->hasMany(RequestTrainer::class, 'user_id');
    }
    public function portfolio()
    {
        return $this->hasOne(TrainerModel::class);
    }
}
