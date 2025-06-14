<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quality;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualities = [
            ['name' => 'CHILLY XL', 'size' => 2],
            ['name' => 'CHILLY 8 PART', 'size' => 2.18],
            ['name' => 'CHILLY XXL', 'size' => 2.25],
            ['name' => 'SUPREME GOLD XL', 'size' => 2],
            ['name' => 'SUPREME GOLD 8 PART', 'size' => 2.18],
            ['name' => 'SUPREME GOLD XXL', 'size' => 2.25],
            ['name' => 'GOD CHOICE XL', 'size' => 2],
            ['name' => 'GOD CHOICE 8 PART', 'size' => 2.18],
            ['name' => 'GOD CHOICE XXL', 'size' => 2.25],
        ];

        foreach ($qualities as $quality) {
            Quality::create($quality);
        }
    }
}
