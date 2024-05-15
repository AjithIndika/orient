<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\BoxDetails;

class box_details extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('box_details')->insert([
           // 'box_details_name' => Int::random(10),
            'box_details_name' => Str::random(10),
            'box_details_serial_number' => Str::random(10)
        ]);

        

    }
}
