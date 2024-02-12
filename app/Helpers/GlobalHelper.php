<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class GlobalHelper

{
   public static function getSettings(): array
    {
        return cache()->rememberForever('settings', function () {
            return Setting::all()->toArray();
        });
    }

    public static function getSettingModel(): ?Setting
    {
        $settings = self::getSettings();
        return !empty($settings) ? new Setting($settings[0]) : null;
    }

    public static function hasImages(): bool
    {
        $settingModel = self::getSettingModel();

        // Check if the model exists and has the 'images' collection
        return $settingModel && $settingModel->hasMedia('settings.logo');
    }

    public static function hasDocuments(): bool
    {
        $settingModel = self::getSettingModel();

        // Check if the model exists and has the 'documents' collection
        return $settingModel && $settingModel->hasMedia('settings.favicon');
    }

    public static function getSettingValue(string $columnName): string
    {
        $settingModel = self::getSettingModel();

        // Check if the model exists before accessing the media
        if ($settingModel) {
            // Get the media items from the 'images' collection
            $imagesMedia = $settingModel->getMedia('images');
            // Get the media items from the 'documents' collection
            $documentsMedia = $settingModel->getMedia('documents');

            // Do something with $imagesMedia and $documentsMedia
        }

        return $settingModel ? $settingModel->$columnName : '';
    }

    public static function processAllSettings(): array
    {
        $settings = self::getSettings();

        // Process the settings array, modify or format the data as needed
        foreach ($settings as &$setting) {
            // Process each setting, if necessary
        }

        return $settings;
    }

    public static function getAllSettings(): array
    {
            return self::processAllSettings();
     }
}