<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliersDetails extends Model
{
    protected $fillable = ['suppliers_id','suppliers_name', 'suppliers_address', 'suppliers_relation_officer_name','suppliers_telephone','suppliers_email','suppliers_register_user','created_at','updated_at'];
    use HasFactory;
}
