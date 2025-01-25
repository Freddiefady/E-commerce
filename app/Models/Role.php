<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    public $translatable = ['role'];
    // protected $casts = ['permissions' => 'array'];
    protected $fillable = ['role', 'permissions'];

    // public function getPermissionsAttribute($permissions)
    // {
    //     return json_decode($permissions);
    // }
    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'permissions' => 'array',
        ];
    }
}
