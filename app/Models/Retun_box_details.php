<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retun_box_details extends Model
{
    use HasFactory;

    protected $fillable = ['retun_box_details_id',
                            'retun_geatpass_details_number',
                            'geatpass_details_number',
                            'box_details_id',
                            'customers_id',
                            'last_invoice_date',
                            'return_delivery_note_number',
                            'return_delivery_note_date',
                            'return_by'];

}


