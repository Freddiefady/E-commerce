<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");
        Brand::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS = 1;");

        $brands = [
            [
                'name' => ['en'=>'Apple', 'ar'=>'آبل'],
                'logo' => 'https://logos.world.net/wp-content/uploads/2020/04/Apple-Logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en'=>'Xiaomi', 'ar'=>'شاومى'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/29/Xiaomi_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en'=>'OnePlus', 'ar'=>'وان بلـس'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/ab/OnePlus.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en'=>'HTC', 'ar'=>'اتش تى سى'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en'=>'Reebook', 'ar'=>'ريبوك'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Reebook_Logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Apple',
                    'ar' => 'أبل',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Nike',
                    'ar' => 'نايكي',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Samsung',
                    'ar' => 'سامسونج',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Adidas',
                    'ar' => 'أديداس',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Toyota',
                    'ar' => 'تويوتا',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Toyota_logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Mercedes-Benz',
                    'ar' => 'مرسيدس بنز',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/90/Mercedes-Logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Honda',
                    'ar' => 'هوندا',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Honda.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Google',
                    'ar' => 'جوجل',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Facebook',
                    'ar' => 'فيسبوك',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Coca-Cola',
                    'ar' => 'كوكا كولا',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/17/Coca-Cola_logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Pepsi',
                    'ar' => 'بيبسي',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Pepsi_Logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Tesla',
                    'ar' => 'تسلا',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Tesla_Motors.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Amazon',
                    'ar' => 'أمازون',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'McDonald\'s',
                    'ar' => 'ماكدونالدز',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e4/McDonalds_logo.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Starbucks',
                    'ar' => 'ستاربكس',
                ],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Starbucks_Corporation_Logo_2011.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
