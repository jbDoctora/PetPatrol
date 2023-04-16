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
        'service_id', 'request_id', 'trainer_name', 'request_id', 'reason_reject', 'gcash_refnum', 'isRated'
    ];

    public function getCodeAttribute()
    {
        return 'BOOK-00' . $this->book_id;
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('F d, Y');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('F d, Y');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['status'])) {
            $query->where('status', 'like', '%' . $filters['status'] . '%');
        }
        if (isset($filters['pet_type'])) {
            $query->whereHas('pet_info', function ($q) use ($filters) {
                $q->where('pet_type', $filters['pet_type']);
            });
        }
        if (isset($filters['start_date'])) {
            $query->where('start_date', '>=', $filters['start_date']);
        }
        if (isset($filters['end_date'])) {
            $query->where('end_date', '<=', $filters['end_date']);
        }
        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('trainer_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('pet_info.pet_name', 'like', '%' . $filters['search'] . '%');
            });
        }
        return $query;
    }

    protected $table = 'booking';
    public $timestamps = false;
}
