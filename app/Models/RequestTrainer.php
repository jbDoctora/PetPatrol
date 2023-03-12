<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTrainer extends Model
{
    protected $fillable = [
        'pet_name', 'course', 'sessions', 'location', 'user_id', 'pet_type'
    ];
    protected $table = "request";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
