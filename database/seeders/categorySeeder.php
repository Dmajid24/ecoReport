<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sampah Organik',
                'description' => 'Sampah yang dapat terurai secara alami seperti sisa makanan dan daun.'
            ],
            [
                'name' => 'Sampah Anorganik',
                'description' => 'Sampah yang tidak mudah terurai seperti plastik dan kaleng.'
            ],
            [
                'name' => 'Sampah B3',
                'description' => 'Bahan berbahaya dan beracun seperti baterai, jarum suntik, dan cat.'
            ],
            [
                'name' => 'Limbah Rumah Tangga',
                'description' => 'Sampah yang berasal dari kegiatan rumah tangga.'
            ],
            [
                'name' => 'Limbah Elektronik',
                'description' => 'Sampah elektronik seperti HP rusak, laptop rusak, atau kabel bekas.'
            ]
        ];

        foreach ($categories as $cat) {
            category::create($cat);
        }
    }
}
