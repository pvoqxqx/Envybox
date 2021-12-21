<?php

namespace App\Http\Controllers;

use App\Http\Services\SettingsGettingService;
use App\Http\Services\SettingsSavingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private SettingsSavingService $settingsSavingService;
    private SettingsGettingService $settingsGettingService;

    /**
     * @param SettingsSavingService $settingsSavingService;
     * @param SettingsGettingService $settingsGettingService;
     */
    public function __construct(
        SettingsSavingService $settingsSavingService,
        SettingsGettingService $settingsGettingService
    ) {
        $this->settingsSavingService = $settingsSavingService;
        $this->settingsGettingService = $settingsGettingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function show(): view
    {
        return view('settings', [
            'type' => $this->settingsGettingService->getCurrentType(),
        ]);
    }

    public function save(Request $request)
    {
        $this->settingsSavingService->save($request->value);
    }
}
