<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingDetails extends Model
{
    protected $primaryKey = 'training_id';
    protected $fillable = ['service_id', 'lesson', 'start_time', 'end_time'];

    protected $table = 'training_details';
    public $timestamps = false;

    public function getStartTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('g:i A');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->format('g:i A');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
