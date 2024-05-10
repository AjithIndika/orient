<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceMacineDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_macine_details_id',
        'invoice_details_number',
        'geatpass_details_number',
        'machin_list_details_id',
        'customers_id',
        'box_details_id',
        'box_details_recive_date',
        'box_details_recive_by',
        'machin_type_details_id',
        'paddle_details_id',
        'paddle_details_recive_date',
        'paddle_details_recive_by',
        'iron_details_id',
        'iron_details_recive_date',
        'iron_details_recive_by',
        'machin_list_details_daily_rent',
        'branches_id',
        'delivery_machine_details_user',
        'delivery_machine_details_date',
        'last_invoice_date',
        'return_delivery_note_number',
        'return_delivery_note_date',
        'return_delivery_recive_by',
        'used_date',
        'cost_of_used_date',
        'invoice_date'
    ];
}


