<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = self::firstOrCreateSettings();
        view()->share([
            'settings' => $settings
        ]);
    }

    /**
     * Get the settings if not exists create new one.
     *
     * @return Setting
     */
    protected function firstOrCreateSettings(): mixed
    {
        return $settings = Setting::firstOr(function () {
            return Setting::create([
                'site_name' => [
                    'en' => 'E-commerce',
                    'ar' => 'التجارة الإلكترونية'
                ],
                'site_description' => [
                    'en' => 'E-commerce website',
                    'ar' => 'موقع التجارة الإلكترونية'
                ],
                'address' => [
                    'en' => '25st, misr el gdeda, Cairo, Egypt',
                    'ar' => '25 شارع مصر الجديده, القاهرة، مصر'
                ],
                'phone' => '012012011010',
                'email' => 'ecommerce@gmail.com',
                'email_support' => 'ecommerce-support@gmail.com',
                'facebook_url' => 'http://www.facebook.com',
                'twitter_url' => 'http://www.twitter.com',
                'youtube_url' => 'http://www.youtube.com',
                'logo' => 'logo.png',
                'favicon' => 'favicon.png',
                'meta_description' => [
                    'en' => 'E-commerce website',
                    'ar' => 'موقع التجارة الإلكترونية'
                ],
                'site_copyright' =>'©2025 E-commerce Name. All rights reserved.',
                'promotion_video_url' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
            ]);
        });
    }
}
