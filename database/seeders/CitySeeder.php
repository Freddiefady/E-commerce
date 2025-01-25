<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Abu Qir",
                    'ar' => "ابو قير"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Agami",
                    'ar' => "العجمى",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Alexandria",
                    'ar' => "الإسكندرية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Ar-Raml",
                    'ar' => "الرمل"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Borg El Arab",
                    'ar' => "برج العرب"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Montaza",
                    'ar' => "منتزة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "New Borg El Arab",
                    'ar' => "برج العرب الجديد"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Sidi Bishr",
                    'ar' => "سيدي بشر"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Abu Simbel",
                    'ar' => "أبو سمبل"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Aswan",
                    'ar' => "أسوان"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Idfū",
                    'ar' => "إديفو"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Kawm Umbū",
                    'ar' => "كوم أوبومبو"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Abnūb",
                    'ar' => "أبنوب"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Abū Tīj",
                    'ar' => "أبو تيج"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Al Badārī",
                    'ar' => "البداري"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Al Qūşīyah",
                    'ar' => "القوصية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Asyūţ",
                    'ar' => "اسيوط"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Dayrūţ",
                    'ar' => "الديروط"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Manfalūţ",
                    'ar' => "منفلوت"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Abū al Maţāmīr",
                    'ar' => "أبو المطامير"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Ad Dilinjāt",
                    'ar' => "أد دلنجات"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Damanhūr",
                    'ar' => "دمنهور"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Ḩawsh ‘Īsá",
                    'ar' => "حوش عيسا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Idkū",
                    'ar' => "إديكو"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Kafr ad Dawwār",
                    'ar' => "كفر الدوار"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Kawm Ḩamādah",
                    'ar' => "كوم حمادة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Rosetta",
                    'ar' => "روسيتا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Al Fashn",
                    'ar' => "الفشن"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Banī Suwayf",
                    'ar' => "بني سويف"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'en' => "Būsh",
                    'ar' => "بوش"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    'ar' => "سمسطا سلطاني",
                    'en' => "Sumusţā as Sulţānī",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Badr",
                    "ar" => "بدر",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Bulaq",
                    "ar" => "بولاق",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Cairo",
                    "ar" => "القاهرة",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "ar" => "المطرية",
                    "en" => "El Mataria",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Fustat",
                    "ar" => "الفستات",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Hadayek El Kobba",
                    "ar" => "حدائق القبة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Heliopolis",
                    "ar" => "هليوبوليس"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Helwan",
                    "ar" => "حلوان"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Maadi",
                    "ar" => "معادى"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Misr EL-Gedida",
                    "ar" => "مصر الجديدة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Musturud",
                    "ar" => "مسطرد"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "New Administrative Capital of Egypt",
                    "ar" => "مدينة العاصمة الادارية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Shubra",
                    "ar" => "شبرا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Tura",
                    "ar" => "طرا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Aizbat al Burj",
                    "ar" => "عزبات البرج"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Ajā",
                    "ar" => "عجا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Jammālīyah",
                    "ar" => "الجمالية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Manşūrah",
                    "ar" => "المنصورة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Manzalah",
                    "ar" => "المنزلة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Maţarīyah",
                    "ar" => "المطرية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Bilqās",
                    "ar" => "بلقاس"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Dikirnis",
                    "ar" => "دكرنس"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Minyat an Naşr",
                    "ar" => "منية النصر"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Shirbīn",
                    "ar" => "شربين"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ţalkhā",
                    "ar" => "طلخا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Az Zarqā",
                    "ar"=> "عزقا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Damietta",
                    "ar"=> "دمياط"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Fāraskūr",
                    "ar"=> "فارسكور"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Fayyūm",
                    "ar"=> "الفيوم"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Wāsiţah",
                    "ar"=> "الواسيطة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ibshawāy",
                    "ar"=> "إبشاوى"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Iţsā",
                    "ar"=> "إيتسا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ţāmiyah",
                    "ar"=> "طاميه"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Maḩallah al Kubrá",
                    "ar"=> "المحلة الكبرى"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Basyūn",
                    "ar"=> "باسيون"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Kafr az Zayyāt",
                    "ar"=> "كافر الزيات"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Quţūr",
                    "ar"=> "قطور"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Samannūd",
                    "ar"=> "سامانود"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Tanda",
                    "ar"=> "طنطا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Zefta",
                    "ar"=> "زفتة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al ‘Ayyāţ",
                    "ar"=> "العياط"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Bawīţī",
                    "ar"=> "البويثي"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Ḩawāmidīyah",
                    "ar"=> "الحوامدية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Awsīm",
                    "ar"=> "الوسيم"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Giza",
                    "ar"=> "جيزة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Madīnat Sittah Uktūbar",
                    "ar"=> "مدينة 6 اكتوبر"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ismailia",
                    "ar"=> "الإسماعيلية"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Ḩāmūl",
                    "ar"=> "الحامل"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Disūq",
                    "ar"=> "دسوق"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Fuwwah",
                    "ar"=> "فوهة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Kafr ash Shaykh",
                    "ar"=> "كفر الشيخ"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Markaz Disūq",
                    "ar"=> "مركز دسوق"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Munshāt ‘Alī Āghā",
                    "ar"=> "منشية على أغا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Sīdī Sālim",
                    "ar"=> "سيد سالم"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Luxor",
                    "ar"=> "الأقصر"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Markaz al Uqşur",
                    "ar"=> "مركز الأقصر"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al ‘Alamayn",
                    "ar"=> "العالمين"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Mersa Matruh",
                    "ar"=> "مرسى مطروح"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Siwa Oasis",
                    "ar"=> "واحة سيوة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Abū Qurqāş",
                    "ar"=> "أبو قرقاس"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Minyā",
                    "ar"=> "المنيا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Banī Mazār",
                    "ar"=> "بني مزار"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Dayr Mawās",
                    "ar"=> "دير موس"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Mallawī",
                    "ar"=> "مالوي"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Maţāy",
                    "ar"=> "مطاي"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Samālūţ",
                    "ar"=> "صاملوت"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Bājūr",
                    "ar"=> "الباجور"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ashuhadā",
                    "ar"=> "الشهداء"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ashmūn",
                    "ar"=> "اشمون"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Munūf",
                    "ar"=> "منوف"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Quwaysinā",
                    "ar"=> "قويسينة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Shibīn al Kawm",
                    "ar"=> "شيبين الكوم"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Talā",
                    "ar"=> "طالا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Khārijah",
                    "ar"=> "الخارجة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Qaşr al Farāfirah",
                    "ar"=> "قصر الفرافيرة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Arish",
                    "ar"=> "عريش"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Port Said",
                    "ar"=> "بورسعيد"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Khānkah",
                    "ar"=> "الخانكة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Qanāţir al Khayrīyah",
                    "ar"=> "القناطر الخيريه"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Banhā",
                    "ar"=> "بنها"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Qalyūb",
                    "ar"=> "قليوب"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Shibīn al Qanāṭir",
                    "ar"=> "شبين القناطر"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Toukh",
                    "ar"=> "توخ"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Dishnā",
                    "ar"=> "ديشنا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Farshūţ",
                    "ar"=> "فرشوط"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Isnā",
                    "ar"=> "إسنا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Kousa",
                    "ar"=> "كوسا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Naja' Ḥammādī",
                    "ar"=> "نجع حمادي"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Qinā",
                    "ar"=> "قنا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Quşayr",
                    "ar"=> "القصير"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "El Gouna",
                    "ar"=> "الجوونة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Hurghada",
                    "ar"=> "الغردقة"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Makadi Bay",
                    "ar"=> "مكادى باى"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Marsa Alam",
                    "ar"=> "مرسى علم"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Ras Gharib",
                    "ar"=> "راس غارب"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Safaga",
                    "ar"=> "سفاجا"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "10th of Ramadan",
                    "ar"=> "العاشر من رمضان"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Al Qurein",
                    "ar"=> "القرين"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Awlad Saqr",
                    "ar"=> "أولاد صقر"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Bilbeis",
                    "ar"=> "بلبيس"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Diyarb Negm",
                    "ar"=> "ديرب نجم"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "El Husseiniya",
                    "ar"=> "الحسينية"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Faqous",
                    "ar"=> "فقوس"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Hihya",
                    "ar"=> "هيها"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Kafr Saqr",
                    "ar"=> "كفر صقر"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Markaz Abū Ḩammād",
                    "ar"=> "مركز أبو حماد"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Mashtoul El Souk",
                    "ar"=> "مشتول السوق"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en"=> "Minya El Qamh",
                    "ar"=> "منيا القمح"
                ]
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "New Salhia",
                    "ar" => "الصالحية الجديدة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Zagazig",
                    "ar" => "زقازيق"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Akhmīm",
                    "ar" => "أخميم",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Balyanā",
                    "ar" => "ألبليانة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Al Manshāh",
                    "ar" => "المنشاة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Jirjā",
                    "ar" => "جيرجا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Juhaynah",
                    "ar" => "جهينة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Markaz Jirjā",
                    "ar" => "مركز جيرجا"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Markaz Sūhāj",
                    "ar" => "مركز سوهاج"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Sohag",
                    "ar" => "سوهاج"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Ţahţā",
                    "ar" => "تاهطا",
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Dahab",
                    "ar" => "دهب"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "El-Tor",
                    "ar" => "التور"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Nuwaybi‘a",
                    "ar" => "نويبع"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Saint Catherine",
                    "ar" => "سانت كاترين"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=>[
                    "en" => "Sharm el-Sheikh",
                    "ar" => "شرم الشيخ"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Ain Sukhna",
                    "ar" => "العين السخنة"
                ],
            ],
            [
                "governorate_id"=> 1,
                "name"=> [
                    "en" => "Suez",
                    "ar" => "السويس"
                ],
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
