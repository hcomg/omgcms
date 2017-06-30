<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale(Request $request, $locale = 'en')
    {
        if (\Auth::user()) {
            $user = \Auth::user();
        } else {
            $user = User::whereIn('api_token', get_api_token_from_request($request))->first();
        }
        if ($user) {
            $user->locale = $locale;
            try {
                $user->save();
            } catch (QueryException $exception) {
                \Log::error($exception->getMessage());
                return redirect()->back()->withInput()->withErrors(['error' => 'Can not set your locale.']);
            }
        } else {
            Cookie::queue('locale', $locale);
        }
        return redirect()->back()->withInput()->with(['success' => 'Your locale has been updated.']);
    }
}
