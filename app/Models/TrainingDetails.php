<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDetails extends Model
{
    protected $fillable = ['service_id', 'day', 'lesson', 'start_time', 'end_time'];

    protected $table = 'training_details';
    public $timestamps = false;

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
}
