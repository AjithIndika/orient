<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempOtheParts extends Model
{
    use HasFactory;
    protected $fillable = ['tempGetpassid','othe_parts_id','customers_id','othe_parts_daily_rate','othe_parts_sn'];
}
