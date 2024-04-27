<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMachineDetails extends Model
{
    protected $fillable = ['delivery_machine_details_id', 'geatpass_details_number', 'machin_list_details_id', 'customers_id', 'box_details_id', 'machin_type_details_id', 'paddle_details_id', 'iron_details_id', 'machin_list_details_daily_rent', 'branches_id', 'delivery_machine_details_user', 'delivery_machine_details_date', 'last_invoice_date', 'return_delivery_note_number', 'return_delivery_note_date'];
    use HasFactory;
}
