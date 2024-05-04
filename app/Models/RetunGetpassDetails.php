<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetunGetpassDetails extends Model
{
    use HasFactory;
    protected $fillable = ['retun_geatpass_details_id',
    'retun_geatpass_details_number',
    'retun_geatpass_details_number_hash',
    'retun_customers_id',
    'retun_geatpass_details_vehicle',
    'retun_geatpass_details_driver_name',
    'retun_geatpass_details_driver_nic',
    'retun_geatpass_details_driver_mobile',
    'return_gatepass_number',
    'retun_geatpass_details_crate_by'];
}
