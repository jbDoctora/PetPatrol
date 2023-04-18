<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetInfo extends Model
{
    protected $primaryKey = 'pet_id';
    // protected $incrementing = false;
    protected $fillable = [
        'pet_name', 'years', 'months', 'breed', 'type', 'weight', 'image', 'owner_id', 'info', 'vaccine', 'vaccine_list', 'book_status'
    ];
    protected $table = 'pet_info';
    public $timestamps = false;

    //Relationship sa petInfo ug sa client
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['status'])) {
            $query->where('pet_info.book_status', 'like', '%' . $filters['status'] . '%');
        }
        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('pet_info.pet_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('booking.pet_id', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('pet_info.type', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query; // return the query builder instance
    }
}
