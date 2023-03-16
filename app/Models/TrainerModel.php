<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerModel extends Model
{

    public $incrementing = false;
    protected $fillable = [
        'about_me', 'services', 'type', 'certificates', 'experience', 'journey_photos', 'profile_photo', 'user_id'
    ];
    protected $table = 'portfolio';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
