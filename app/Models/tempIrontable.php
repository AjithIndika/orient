<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempIrontable extends Model
{

    protected $fillable = ['temp_irontables_id','iron_details_id','customers_id','tempGetpassid', 'iron_daily_rent','iron_details_serial_number'];
    use HasFactory;
}
