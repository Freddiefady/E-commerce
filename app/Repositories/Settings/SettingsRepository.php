<?php

namespace App\Repositories\Settings;

use App\Models\Setting;

class SettingsRepository
{
    /**
     * Get Settings By Id
     * @param mixed $id
     */
    public function getSettingsById($id)
    {
        return Setting::find($id);
    }

    /**
     * Summary of update
     * @param mixed $settings
     * @param array $data
     */
    public function update($settings,array $data)
    {
        return $settings->update($data);
    }
}

