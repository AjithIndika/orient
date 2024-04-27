<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetpassTempItemsDetails extends Model
{
    protected $fillable = ['getpass_temp_items_details_id','tempGetpassid','machin_list_details_id','machin_type_details_id','box_details_id', 'paddle_details_id','iron_details_id','machin_list_details_daily_rent','geatpass_temp_details_user_id','branches_id','geatpass_temp_details_date'];
    use HasFactory;
}
