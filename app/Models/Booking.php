<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'pet_id', 'client_id', 'trainer_id', 'status', 'date', 'payment', 'client_name'
    ];
    protected $table = 'booking';
    public $timestamps = false;
}
