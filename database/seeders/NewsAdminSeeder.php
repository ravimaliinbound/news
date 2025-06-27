<?php

namespace Database\Seeders;

use App\Models\news_admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewsAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        news_admin::create([
            'name' => 'Vishal Mali',
            'email' => 'vishal@gmail.com',
            'password' => Hash::make('00000000')
        ]);
    }
}
