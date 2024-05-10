<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retun__Othe_Parts extends Model
{
    use HasFactory;
    protected $fillable = ['retun___othe__parts_id','retun_geatpass_details_number','geatpass_details_number','othe_parts_id','customers_id','othe_parts_daily_rate',
                            'othe_parts_sn','last_invoice_date','return_delivery_note_number','return_delivery_note_date','return_by'];
}



