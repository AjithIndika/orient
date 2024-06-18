<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //protected $table ="incomes" ;
    protected $fillable = ['incomes_invoice_id','incomes_date','incomes_amount'];
    use HasFactory;

}
