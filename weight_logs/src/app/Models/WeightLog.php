<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function scopeLatestN($query, $count =10)
    {
        return $query->orderBy('created_at','desc')->take($count);
    }

    public function WeightLog()
    {
        return $this->belongsTo(WeightLog::class);
    }
}
