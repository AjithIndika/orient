<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permittion extends Model
{
    use HasFactory;
    protected $fillable = ['permittions_id','user_id','permittions'];
}
