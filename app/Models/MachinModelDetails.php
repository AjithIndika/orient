<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinModelDetails extends Model
{
    protected $fillable = ['machin_model_details_id','machin_model_details_name'];
    use HasFactory;
}
