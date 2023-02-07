<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerModel extends Model
{
    protected $fillable = [
        'about_me', 'services', 'type', 'certificates', 'experience', 'journey_photos', 'profile_photo',
    ];
    protected $table = 'portfolio';
    public $timestamps = false;
}
