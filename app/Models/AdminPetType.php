<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPetType extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['admin_petType', 'isPosted'];
    protected $table = 'admin_pet_type';
    public $timestamps = false;
}
