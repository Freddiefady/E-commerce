<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =
        [
            [
                'name' => ['en'=> 'Electronics', 'ar' => 'الكترونيات'],
                'parent' => null
            ],
            [
                'name' => ['en'=> 'Clothes', 'ar' => 'الملابس'],
                'parent' => null
            ],
            [
                'name' => ['en'=> 'Books', 'ar' => 'الكتب'],
                'parent' => null
            ],
            [
                'name' => ['en'=> 'Personal Care and Beauty', 'ar' => 'مستحضرات التجميل و العناية الشخصية'],
                'parent' => null
            ],
            [
                'name' => ['en'=> 'Food', 'ar' => 'الطعام'],
                'parent' => null
            ],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
