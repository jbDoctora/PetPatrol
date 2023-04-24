<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSuggestions extends Model
{
    protected $fillable = [
        'name', 'description', 'report_type'
    ];
    protected $table = 'report_suggestions';
    public $timestamps = false;

    public function getCodeAttribute()
    {
        return 'RPT-' . $this->id;
    }
}
