<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, HasTranslations;
    protected $translatable = ['question', 'answer'];
    protected $timestamp = false;
    protected $fillable = [
        'question',
        'answer'
    ];


}
