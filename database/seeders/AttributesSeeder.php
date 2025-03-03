<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValues;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");
        Attribute::truncate();
        AttributeValues::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS = 1;");

        $colorVariant = Attribute::create([
            'name' => ['en' => 'Color', 'ar' => 'اللون'],
        ]);
        $colorVariant->attributeValues()->createMany([
            ['value' => ['en' => 'Red', 'ar' => 'أحمر']],
            ['value' => ['en' => 'Blue', 'ar' => 'أزرق']],
            ['value' => ['en' => 'Green', 'ar' => 'أخضر']],
        ]);

        $sizeVariant = Attribute::create([
            'name' => ['en' => 'Size', 'ar' => 'الحجم'],
        ]);
        $sizeVariant->attributeValues()->createMany([
            ['value' => ['en' => 'small', 'ar' => 'صغير']],
            ['value' => ['en' => 'medium', 'ar' => 'متوسط']],
            ['value' => ['en' => 'large', 'ar' => 'كبير']],
            ['value' => ['en' => 'xlg', 'ar' => 'كبير جدا']],
            ['value' => ['en' => 'xxlg', 'ar' => 'كبير جدا']],
            ['value' => ['en' => 'xxxlg', 'ar' => 'كبير جدا']],
        ]);
    }
}
