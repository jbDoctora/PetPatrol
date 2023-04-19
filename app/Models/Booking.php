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
            $query->where('booking.status', 'like', '%' . $filters['status'] . '%');
        }
        if (isset($filters['pet_type'])) {
            $query->where('pet_info.type', 'like', '%' . $filters['pet_type'] . '%');
        }
        if (isset($filters['start_date'])) {
            $query->where('booking.start_date', '>=', date('Y-m-d', strtotime($filters['start_date'])));
        }
        if (isset($filters['end_date'])) {
            $query->where('booking.end_date', '<=', date('Y-m-d', strtotime($filters['end_date'])));
        }
        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('booking.trainer_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('booking.book_id', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('pet_info.pet_name', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query; // return the query builder instance
    }

    public function save(array $options = [])
    {
        $originalStatus = $this->getOriginal('status');
        $newStatus = $this->getAttribute('status');

        if ($originalStatus !== $newStatus) {
            // create notification
            $notification = new UserNotification([
                'message' => "Booking status for booking ID {$this->book_id} has changed to {$newStatus}."
            ]);

            // set notifiable type and ID
            $notification->notifiable_type = 'App\Models\User';
            $notification->notifiable_id = $this->client_id;

            // save notification
            $notification->save();
        }

        parent::save($options);
    }


    protected $table = 'booking';
    public $timestamps = false;
}

trait Notificationable
{
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
