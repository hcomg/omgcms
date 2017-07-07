<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Config;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tokens = get_api_token_from_request($request);
        $user = false;
        if (\Auth::user()) {
            $user = \Auth::user();
        } elseif (!empty($tokens)) {
            $user = User::whereIn('api_token', $tokens)->first();
        }

        if ($user && $user->locale) {
            $locale = $user->locale;
        } else {
            $locale = $request->cookie('locale', Config::get('app.locale'));
        }
        \App::setLocale($locale);
        Carbon::setLocale($locale);

        return $next($request);
    }
}
