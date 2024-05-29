<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePaddletails extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_paddletails_id',
        'invoice_details_number',
        'geatpass_details_number',
        'paddle_details_id',
        'customers_id',
        'paddle_daily_rent',
        'deliverypaddle_user',
        'deliverypaddle_date',
        'branches_id',
        'last_invoice_date',
        'return_delivery_note_number',
        'return_delivery_note_date',
        'return_delivery_recive_by',
        'used_date',
        'cost_of_used_date',
        'invoice_date'




    ];
}




