<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

   // protected $table = 'branches';

   protected $fillable = ['branches_id','branches_name', 'branches_address', 'branches_telephone','branches_email'];
    use HasFactory;
}
