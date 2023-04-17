<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // define table name and primary key
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    // define fillable columns
    protected $fillable = [
        'notifiable_type',
        'notifiable_id',
        'message',
        'read_at'
    ];

    // define relationships
    public function notifiable()
    {
        return $this->morphTo();
    }

    public function markAsRead()
    {
        $this->read_at = now();
        $this->save();

        return redirect('/bookings');
    }
}
