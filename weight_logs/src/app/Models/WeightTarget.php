<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

    protected $table = 'weight_target_table';

    public function WeightLog()
    {
       return $this->belongsTo(WeightTarget::class);
    }
}
