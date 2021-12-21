<?php

namespace App\Http\Services;

use App\Models\Settings;

class SettingsSavingService
{
    /**
     * @param string $type
     * @return void
     */
    public function save(string $type): void
    {
        $updatedSettings = Settings::all()->first() ?: new Settings();

        $updatedSettings->type = $type;
        $updatedSettings->save();
    }

}
