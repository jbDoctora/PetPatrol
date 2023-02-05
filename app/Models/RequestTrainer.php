<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTrainer extends Model
{
    protected $fillable = [
        'pet', 'vaccinated', 'course', 'info', 'sessions', 'date', 'location' 
    ];
    protected $table = "request";
    public $timestamps = false;
}
