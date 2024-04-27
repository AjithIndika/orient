<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IronDetails extends Model
{
    protected $fillable = ['iron_details_id','iron_details_name','iron_details_serial_number','iron_details_status','deliveryNote_id','iron_daily_rent'];
    use HasFactory;
}
