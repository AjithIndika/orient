<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retun_paddle_details extends Model
{
    use HasFactory;
    protected $fillable = ['retun_paddle_details_id',
                            'retun_geatpass_details_number',
                            'geatpass_details_number',
                            'paddle_details_id',
                            'customers_id',
                            'paddle_daily_rent',
                            'last_invoice_date',
                            'return_delivery_note_number',
                            'return_delivery_note_date',
                            'return_by'];
}
