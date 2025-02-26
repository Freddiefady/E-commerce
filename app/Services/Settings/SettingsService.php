<?php

namespace App\Services\Settings;

use App\Repositories\Settings\SettingsRepository;
use App\Utils\ImageManager;

class SettingsService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected SettingsRepository $settingsRepository,
        protected ImageManager $imageManager
    ) {
        //
    }

    /**
     * Get the settings by id.
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        $settings = $this->settingsRepository->getSettingsById($id);
        return $settings ?? abort(404);
    }

    /**
     * Update the settings.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id,array $data): mixed
    {
        $settings = self::getById($id);
        if (array_key_exists('logo', $data) && $data['logo'] != null) {
            $this->imageManager->deleteImageFromLocal($settings->logo);
            $data['logo'] = $this->imageManager->uploadSingleImage($data['logo'], '/', 'settings');
        }
        if (array_key_exists('favicon', $data) && $data['favicon'] != null) {
            $this->imageManager->deleteImageFromLocal($settings->favicon);
            $data['favicon'] = $this->imageManager->uploadSingleImage($data['favicon'], '/', 'settings');
        }
        return $this->settingsRepository->update($settings, $data);
    }
}
