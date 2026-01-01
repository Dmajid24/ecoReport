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
                'name' => 'Sampah Organik'
            ],
            [
                'name' => 'Sampah Anorganik'
            ],
            [
                'name' => 'Sampah B3'
            ],
            [
                'name' => 'Limbah Rumah Tangga'
            ],
            [
                'name' => 'Limbah Elektronik'
            ]
        ];

        foreach ($categories as $cat) {
            category::create($cat);
        }
    }
}
