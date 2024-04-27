<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinTypeDetails extends Model
{
    protected $fillable = ['machin_type_details_id','machin_type_details_name','machin_type_details_description'];
    use HasFactory;
}
