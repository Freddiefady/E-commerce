<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('countries')->truncate();

        $countries = [
            [
                'id' => 1,
                'phone_code' => '20',
                'name' => [
                    'en' => 'Egypt',
                    'ar' => 'مصر',
                ],
                'flag_icon' => 'eg'
            ],
            [
                'id' => 2,
                'phone_code' => '966',
                'name' => [
                    'en' => 'Saudi Arabia',
                    'ar' => 'المملكة العربية السعودية',
                ],
                'flag_icon' => 'sa'
            ],
            [
                'id' => 3,
                'phone_code' => '971',
                'name' => [
                    'en' => 'United Arab Emirates',
                    'ar' => 'دولة الإمارات العربية المتحدة',
                ],
                'flag_icon' => 'ae'
            ],
            [
                'id' => 4,
                'phone_code' => '965',
                'name' => [
                    'en' => 'Kuwait',
                    'ar' => 'الكويت',
                ],
                'flag_icon' => 'kw'
            ],
        ];
        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
