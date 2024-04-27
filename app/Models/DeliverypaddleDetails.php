<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverypaddleDetails extends Model
{
    protected $fillable = ['deliverypaddle_details_id', 'geatpass_details_number', 'paddle_details_id', 'paddle_daily_rent', 'deliverypaddle_user', 'deliverypaddle_date', 'paddle_details_id', 'last_invoice_date', 'return_delivery_note_number', 'return_delivery_note_date'];
    use HasFactory;
}
