<?php

namespace App\Http\Services;

use App\Models\Settings;

class SettingsGettingService
{
    /**
     * @return string|null
     */
    public function getCurrentType(): ?string
    {
        $settings = Settings::all()->first();

        return $settings->type ?? NULL;
    }
}
