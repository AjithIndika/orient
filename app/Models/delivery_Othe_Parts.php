<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_Othe_Parts extends Model
{
    use HasFactory;
    protected $fillable = ['delivery_othe_parts_id','geatpass_details_number','othe_parts_id','customers_id','othe_parts_daily_rate',
    'othe_parts_sn','delivery_othe_parts_user','delivery_othe_parts_date','last_invoice_date',
    'return_delivery_note_number','return_delivery_note_date','return_delivery_note_by'];
}
