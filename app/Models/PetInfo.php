<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetInfo extends Model
{
    protected $fillable = [
        'pet_name', 'years', 'months', 'breed', 'type', 'weight', 'image', 'owner_id', 'info', 'vaccine', 'vaccine_list'
    ];
    protected $table = 'pet_info';
    public $timestamps = false;

    //Relationship sa petInfo ug sa client
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
