<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class paddleDetails extends Model
{
    protected $fillable = ['paddle_details_id','paddle_details_name','paddle_details_serial_number','paddle_details_status','deliveryNote_id','paddle_daily_rent'];
    use HasFactory;
}
