<?php

use App\results;
use Illuminate\Database\Seeder;

class ResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Tạo dữ liệu mẫu cho bảng results
       for ($i = 1; $i <= 20; $i++) {
        results::create([
            'id_member' => $i,
            'round_matches' => $i,
            'number_matches' => $i,
            'point' => rand(70, 100),
            'result' => rand(0, 1),
        ]);
    }
    }
}
