<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerRating extends Model
{
    protected $fillable = [
        'stars', 'service_id', 'client_id', 'trainer_id', 'comment', 'date_created', 'image',
    ];
    protected $table = 'rating';
    public $timestamps = false;
}
