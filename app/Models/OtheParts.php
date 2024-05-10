<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtheParts extends Model
{
    use HasFactory;
    protected $fillable = [
        'othe_parts_id',
        'othe_parts_types_id',
        'othe_parts_name',
        'othe_parts_sn',
        'othe_parts_daily_rate',
        'othe_parts_status',
        'deliveryNote_id'
    ];
}
