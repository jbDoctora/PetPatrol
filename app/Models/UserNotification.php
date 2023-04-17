<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Notification
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
    public function user()
    {
        return $this->belongsTo(User::class, 'notifiable_id');
    }
}
