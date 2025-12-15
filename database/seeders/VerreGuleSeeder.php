<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpeningHour;

class VerreGuleSeeder extends Seeder
{
    public function run(): void
    {
        OpeningHour::truncate();

        $data = [
            ['day_of_week'=>1,'is_closed'=>true,'opens_at'=>null,'closes_at'=>null], // lundi
            ['day_of_week'=>2,'is_closed'=>false,'opens_at'=>'16:00','closes_at'=>'02:00'],
            ['day_of_week'=>3,'is_closed'=>false,'opens_at'=>'16:00','closes_at'=>'02:00'],
            ['day_of_week'=>4,'is_closed'=>false,'opens_at'=>'16:00','closes_at'=>'02:00'],
            ['day_of_week'=>5,'is_closed'=>false,'opens_at'=>'16:00','closes_at'=>'02:00'],
            ['day_of_week'=>6,'is_closed'=>false,'opens_at'=>'16:00','closes_at'=>'02:00'],
            ['day_of_week'=>7,'is_closed'=>false,'opens_at'=>'15:00','closes_at'=>'23:30'],
        ];

        foreach ($data as $row) OpeningHour::create($row);
    }
}
