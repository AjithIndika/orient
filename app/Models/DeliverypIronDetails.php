<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverypIronDetails extends Model
{
    protected $fillable = ['deliveryp_iron_details_id', 'geatpass_details_number' ,'customers_id','iron_details_id', 'iron_daily_rent', 'deliveryp_iron_user', 'deliveryp_iron_date', 'last_invoice_date', 'return_delivery_note_number', 'return_delivery_note_date','return_delivery_note_by'];
    use HasFactory;
}

