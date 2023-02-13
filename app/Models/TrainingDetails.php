<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDetails extends Model
{
    protected $fillable = ['title', 'description', 'duration'];

    protected $table = 'training_details';
    public $timestamps = false;
}
