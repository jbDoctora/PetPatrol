<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'pet_id', 'client_id', 'trainer_id', 'status', 'start_date', 'end_date', 'payment', 'client_name',
        'service_id', 'request_id', 'trainer_name', 'request_id', 'reason_reject', 'gcash_refnum',
    ];

    public function getCodeAttribute()
    {
        return 'BOOK-00' . $this->book_id;
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('F d, Y');
    }

    protected $table = 'booking';
    public $timestamps = false;
}
