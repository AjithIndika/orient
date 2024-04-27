<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinListDetails extends Model
{
    protected $fillable = ['machin_list_details_id','machin_list_details_barcode','box_details_id','machin_brand_details_id','machin_model_details_id','machin_type_details_id','paddle_details_id','iron_details_id','machin_list_details_daily_rent','machin_list_details_note',
                            'branches_id','machin_list_details_register_user','machin_list_details_register_date_time'];



    use HasFactory;
}
