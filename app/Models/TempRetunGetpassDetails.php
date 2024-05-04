<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempRetunGetpassDetails extends Model
{
    protected $fillable = ['geatpass_temp_details_id','tempGetpassid', 'customers_id', 'geatpass_temp_details_vehicle','geatpass_temp_details_driver_name','geatpass_temp_details_driver_nic','geatpass_temp_details_driver_mobile'];
    use HasFactory;
}
