<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Services\Settings\SettingsService;
use App\Http\Requests\Dashboard\SettingsRequest;

class SettingsController extends Controller
{
    public function __construct(protected SettingsService $settingsService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(SettingsRequest $request, int $id)
    {
        if ($this->settingsService->update($id, $request->except(['_token', '_method']))) {
            return redirect()->back()->with('success', __('dashboard.msg_success_update_settings'));
        }
        return redirect()->back()->with('error', __('dashboard.msg_error_update_settings'));
    }
}
