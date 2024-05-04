<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDetails extends Model
{
   protected $fillable = ['log_id','logdetails','logdetails_ad_user'];
    use HasFactory;
}
