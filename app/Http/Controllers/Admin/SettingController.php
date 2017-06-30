<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    // Settings page
    public function index() {
        $settingGroups = SettingGroup::select(['id', 'name'])
            ->with(['settings'])
            ->get();
        return view('admin.settings.index', [
            'settingGroups' => $settingGroups
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request) {
        $payload = $request->all();
        $setting_keys = array_keys($payload);
        $settings = Setting::whereIn('setting_key', $setting_keys)->get();
        for ($i = 0; $i < count($settings); $i++) {
            foreach ($payload as $setting_key => $item) {
                if ($settings[$i]->setting_key == $setting_key) {
                    $settings[$i]->setting_value = $item;
                }
            }
            try {
                $settings[$i]->save();
            } catch (QueryException $exception) {
                \Log::error($exception->getMessage());
                return redirect()->back()->withInput()->withErrors(['error' => 'Can not update setting.']);
            }
        }
        return redirect()->back()->withInput()->with(['success' => 'Setting updated.']);
    }
}
