<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersDetails extends Model
{
    protected $fillable = ['customers_id','customers_name', 'customers_address', 'Customers_relation_officer_name','customers_telephone','customers_email','customers_register_user','created_at','updated_at'];
    use HasFactory;
}
