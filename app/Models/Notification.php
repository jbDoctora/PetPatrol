<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use Notifiable;
    // define table name and primary key
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    // define fillable columns
    protected $fillable = [
        'type',
        'notifiable',
        'data',
        'read_at'
    ];

    // define relationships
    public function notifiable()
    {
        return $this->morphTo();
    }

    // public function markAsRead()
    // {
    //     $this->read_at = now();
    //     $this->save();

    //     return redirect('/bookings');
    // }
    // public function markAsRead()
    // {
    //     $this->read_at = now();
    //     $this->save();
    //     if (Auth::user()->role == 1) {
    //         return redirect('/trainer/bookings');
    //     } elseif (Auth::user()->role == 0) {
    //         return redirect('/bookings');
    //     }
    // }
}
