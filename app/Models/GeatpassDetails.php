<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeatpassDetails extends Model
{

    protected $fillable = ['geatpass_details_id','geatpass_details_number','customers_id', 'geatpass_details_number_hash','customers_id','geatpass_details_vehicle','geatpass_details_driver_name','geatpass_details_driver_nic','geatpass_details_driver_mobile','geatpass_details_crate_by'];
    use HasFactory;
}
