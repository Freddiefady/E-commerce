<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'site_name.*' => 'required|string|max:255',
        'site_description.*' => 'required|string|max:255',
        'meta_description.*' => 'required|string|min:10|max:255',
        'address.*' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'email_support' => 'required|string|email|max:255',
        'phone' => 'required|string|max:16',
        'facebook_url' => 'required|url|max:255',
        'twitter_url' => 'required|url|max:255',
        'youtube_url' => 'required|url|max:255',
        'promotion_video_url' => 'required|url|max:255',
        'logo' => 'nullable|max:2055|mimes:png,jpg,jpeg',
        'favicon' => 'nullable|max:2055|mimes:png,jpg,jpeg,gif',
        'site_copyright' => 'required|string|max:255'
        ];
    }
}
