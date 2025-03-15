<?php

namespace Database\Seeders;

use App\Models\Governorate;
use App\Models\ShippingGovernorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            array('name' => ['en'=> 'Cairo', 'ar'=> 'القاهرة'], 'country_id' => 1),
            array('name' => ['en'=> 'El-Jiza', 'ar'=> 'الجيزة'], 'country_id' => 1),
            array('name' => ['en'=> 'Alexandria', 'ar'=> 'الأسكندرية'], 'country_id' => 1),
            array('name' => ['en'=> 'Aswan', 'ar'=> 'أسوان'], 'country_id' => 1),
            array('name' => ['en'=> 'Luxor', 'ar'=> 'الاقصر'], 'country_id' => 1),
            array('name' => ['en'=> 'Asyut', 'ar'=> 'أسيوط'], 'country_id' => 1),
            array('name' => ['en'=> 'Bani suwayf', 'ar'=> 'بنى سويف'], 'country_id' => 1),
            array('name' => ['en'=> "Port Said", 'ar'=> 'بورسعيد'], 'country_id' => 1),
            array('name' => ['en'=> 'Damietta', 'ar'=> 'دمياط'], 'country_id' => 1),
            array('name' => ['en'=> 'Kafr el-Sheikh', 'ar'=> 'كفر الشيخ'], 'country_id' => 1),
            array('name' => ['en'=> 'Matrouh', 'ar'=> 'مطروح'], 'country_id' => 1),
            array('name' => ['en'=> 'Dakahlia', 'ar'=> 'الدقهلية'], 'country_id' => 1),
            array('name' => ['en'=> 'Faiyum', 'ar'=> 'الفيوم'], 'country_id' => 1),
            array('name' => ['en'=> 'Gharbia', 'ar'=> 'الغربية'], 'country_id' => 1),
            array('name' => ['en'=> 'Sharqia', 'ar'=> 'الشرقية'], 'country_id' => 1),
            array('name' => ['en'=> 'Monufia', 'ar'=> 'المنوفية'], 'country_id' => 1),
            array('name' => ['en'=> 'Qina', 'ar'=> 'قنا'], 'country_id' => 1),
            array('name' => ['en'=> 'Sawhaj', 'ar'=> 'سوهاج'], 'country_id' => 1),
            array('name' => ['en'=> 'Minya', 'ar'=> 'المنيا'], 'country_id' => 1),
            array('name' => ['en'=> 'South Sinai', 'ar'=> 'سينا الجنوبية'], 'country_id' => 1),
            array('name' => ['en'=> 'North Sinai', 'ar'=> 'سينا الشمالية'], 'country_id' => 1),
            array('name' => ['en'=> 'Red Sea', 'ar'=> 'البحر الاحمر'], 'country_id' => 1),
            array('name' => ['en'=> 'Beheira', 'ar'=> 'البحيرة'], 'country_id' => 1),
            array('name' => ['en'=> 'New Valley', 'ar'=> 'القرية الذكية'], 'country_id' => 1),
            array('name' => ['en'=> 'Ismailia', 'ar'=> 'الإسماعيلية'], 'country_id' => 1),
            array('name' => ['en'=> 'Qalyubia', 'ar'=> 'القليوبية'], 'country_id' => 1),
            array('name' => ['en'=> 'Suez', 'ar'=> 'السويس'], 'country_id' => 1),
            array('name' => ['en'=> 'Asir', 'ar'=> 'اسير'], 'country_id' => 2),
            array('name' => ['en'=> 'Al Bahah', 'ar'=> 'الباحة'], 'country_id' => 2),
            array('name' => ['en'=> 'Al Jawf', 'ar'=> 'الجواف'], 'country_id' => 2),
            array('name' => ['en'=> 'Al Madinah', 'ar'=> 'المدينة'], 'country_id' => 2),
            array('name' => ['en'=> 'Al-Qassim', 'ar'=> 'القسم'], 'country_id' => 2),
            array('name' => ['en'=> 'Eastern Province', 'ar'=> 'المنطقة الشرقية'], 'country_id' => 2),
            array('name' => ['en'=> "Ha'il", 'ar'=> 'يشيد'], 'country_id' => 2),
            array('name' => ['en'=> 'Jizan', 'ar'=> 'جيزان'], 'country_id' => 2),
            array('name' => ['en'=> 'Makkah', 'ar'=> 'مكة'], 'country_id' => 2),
            array('name' => ['en'=> 'Najran', 'ar'=> 'نجران'], 'country_id' => 2),
            array('name' => ['en'=> 'Northern Borders', 'ar'=> 'الحدود الشمالية'], 'country_id' => 2),
            array('name' => ['en'=> 'Riyadh', 'ar'=> 'الرياض'], 'country_id' => 2),
            array('name' => ['en'=> 'Tabuk', 'ar'=> 'تبوك'], 'country_id' => 2),
            array('name' => ['en'=> 'Abu Dhabi Emirate', 'ar'=> 'ابو ظبي'], 'country_id' => 3),
            array('name' => ['en'=> 'Ajman Emirate', 'ar'=> 'إمارة عجمان'], 'country_id' => 3),
            array('name' => ['en'=> 'Dubai', 'ar'=> 'دبى'], 'country_id' => 3),
            array('name' => ['en'=> 'Fujairah', 'ar'=> 'الفجيرة'], 'country_id' => 3),
            array('name' => ['en'=> 'Ras al-Khaimah', 'ar'=> 'رأس الخيمة'], 'country_id' => 3),
            array('name' => ['en'=> 'Sharjah Emirate', 'ar'=> 'إمارة الشارقة'], 'country_id' => 3),
            array('name' => ['en'=> 'Al Ahmadi', 'ar'=> 'الاحمدى'], 'country_id' => 4),
            array('name' => ['en'=> 'Al Farwaniyah', 'ar'=> 'الفروانية'], 'country_id' => 4),
            array('name' => ['en'=> 'Al Jahra', 'ar'=> 'الجهراء'], 'country_id' => 4),
            array('name' => ['en'=> 'Capital', 'ar'=> 'عاصمة'], 'country_id' => 4),
            array('name' => ['en'=> 'Hawalli', 'ar'=> 'Hawalli'], 'country_id' => 4),
            array('name' => ['en'=> 'Mubarak Al-Kabeer', 'ar'=> 'مبارك الكبير'], 'country_id' => 4),
        ];

        foreach ($governorates as $governorate) {
            $gov = Governorate::create($governorate);

            ShippingGovernorate::create([
                'governorate_id' => $gov->id,
                'price' => 100
            ]);
        }
    }
}
