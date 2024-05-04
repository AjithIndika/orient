<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempPaddeltable extends Model
{
    protected $fillable = ['temp_paddeltables_id','paddle_details_id','customers_id', 'tempGetpassid', 'paddle_daily_rent','paddle_details_serial_number'];
    use HasFactory;
}
