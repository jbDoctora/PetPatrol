<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['course', 'pet_type', 'availability', 'days', 'user_id', 'price', 'status', 'capacity'];

    protected $table = 'service';
    public $timestamps = false;

    public function training()
    {
        return $this->hasMany(TrainingDetails::class, 'service_id');
    }

    // If mo error ang relationship, e change ang function name
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
