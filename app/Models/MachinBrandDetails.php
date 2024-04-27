<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinBrandDetails extends Model
{

    protected $fillable = ['machin_brand_details_id','machin_brand_details_name'];
    use HasFactory;
}
