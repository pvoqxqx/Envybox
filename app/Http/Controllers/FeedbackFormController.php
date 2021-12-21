<?php

namespace App\Http\Controllers;

use App\Http\Services\FeedbackCreationFactory;
use App\Http\Services\SettingsGettingService;
use Illuminate\Http\Request;

/**
 * Class FeedbackFormController
 * @package App\Http\Controllers
 */
class FeedbackFormController extends Controller
{
    private SettingsGettingService $settingsGettingService;
    private FeedbackCreationFactory $feedbackCreationFactory;

    /**
     * @param SettingsGettingService $settingsGettingService;
     */
    public function __construct(
        SettingsGettingService $settingsGettingService,
        FeedbackCreationFactory $feedbackCreationFactory
    ) {
        $this->settingsGettingService = $settingsGettingService;
        $this->feedbackCreationFactory = $feedbackCreationFactory;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function uploadFeedback(Request $request): string
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
        ]);

        if ($request->isMethod('post')) {
            $name = $request->name;
            $phone = $request->phone;
            $message = $request->message;
            $type = $this->settingsGettingService->getCurrentType();

            $feedbackCreationService = $this->feedbackCreationFactory->create($type);
            $feedbackCreationService->create($name, $phone, $message);

            return back()->with('success', 'Feedback message saved successfully.');
        }

        return back()->with('error', 'Feedback message saved not saved.');
    }
}
