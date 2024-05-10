<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_details_id', 'invoice_details_number', 'customers_id', 'geatpass_details_number', 'retun_geatpass_details_number', 'invoice_details_customer_number', 'invoice_details_check_by', 'invoice_details_approved', 'invoice_details_approved_by', 'invoice_details_approved_date', 'invoice_details_total', 'invoice_details_balance', 'invoice_details_send_email', 'invoice_details_due_Date'];
}
