<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxDetails extends Model
{
    protected $fillable = ['box_details_id','box_details_name', 'box_details_serial_number','box_details_status'];
    use HasFactory;
}
