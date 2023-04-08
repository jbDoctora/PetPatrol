<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminService extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'admin_service', 'isPosted'
    ];
    protected $table = 'admin_service';
    public $timestamps = false;
}
