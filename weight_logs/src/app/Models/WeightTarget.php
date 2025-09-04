<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

    protected $fillable = ['target_weight'];

    public function WeightLog()
    {
       return $this->belongsTo(WeightTarget::class);
    }
}
