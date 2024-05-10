<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OthePartsType extends Model
{
    use HasFactory;
    protected $fillable = [
        'othe_parts_types_id',
        'othe_parts_types_name',
    ];
}
