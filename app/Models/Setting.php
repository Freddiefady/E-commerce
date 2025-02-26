<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $table = 'settings';
    public $timestamps = false;
    protected $fillable = [
        'site_name',
        'site_description',
        'meta_description',
        'address',
        'email',
        'email_support',
        'phone',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'promotion_video_url',
        'logo',
        'favicon',
        'site_copyright'
    ];
    protected $translatable = [
        'site_name',
        'address',
        'site_description',
        'meta_description',
    ];

    public function getLogoAttribute()
    {
        return 'uploads/settings/' . $this->attributes['logo'];
    }

    public function getFaviconAttribute()
    {
        return 'uploads/settings/' . $this->attributes['favicon'];
    }
}
