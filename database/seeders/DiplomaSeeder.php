<?php

namespace Database\Seeders;

use App\Models\Diploma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiplomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diploma::create([
            'ar_name'=>'عام',
            'en_name'=>'general',
        ]);
    }
}
