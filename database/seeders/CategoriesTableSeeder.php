<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $categories = [
            [
                'id' => 35,
                'name' => 'موبايلات',
                'image' => 'categories/mobile.png',
            ],
            [
                'id' => 36,
                'name' => 'إكسسوارات الموبايل',
                'image' => 'categories/accessories.png',
            ],
            [
                'id' => 37,
                'name' => 'لابتوبات',
                'image' => 'categories/laptop.png',
            ],
            [
                'id' => 38,
                'name' => 'سماعات وصوتيات',
                'image' => 'categories/audio.png',
            ],
            [
                'id' => 39,
                'name' => 'كاميرات',
                'image' => 'categories/camera.png',
            ],
            [
                'id' => 40,
                'name' => 'أجهزة منزلية',
                'image' => 'categories/home_appliances.png',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
