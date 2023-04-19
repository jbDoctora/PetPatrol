<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingDetails extends Model
{
    protected $primaryKey = 'training_id';
    protected $fillable = ['service_id', 'lesson', 'description', 'hasDone'];

    protected $table = 'training_details';
    public $timestamps = false;


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
