<?php

use App\members;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo dữ liệu mẫu cho bảng members
        for ($i = 1; $i <= 20; $i++) {
            members::create([
                'name' => 'Member ' . $i,
                'images' => 'member' . $i . '.jpg',
                'note' => 'Sample note for Member ' . $i,
            ]);
        }
    }
}
