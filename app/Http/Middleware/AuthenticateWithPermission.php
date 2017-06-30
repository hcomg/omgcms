<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Response;

class AuthenticateWithPermission
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
        if (\Auth::user()) {
            $user = \Auth::user();
        } else {
            $user = User::whereIn('api_token', get_api_token_from_request($request))->first();
        }

        // Check user permissions
        if ($user && $user->permissions->count()) {
            foreach ($user->permissions as $permission) {
                if ($request->route()->getName() === $permission->route_name) {
                    return $next($request);
                }
            }
        }
        // Response result
        if ($request->expectsJson() || strpos($request->header('Content-Type'), 'json') !== false) {
            return Response::json([
                'message' => 'Unauthenticated.'
            ], 401);
        }
        abort(401, 'Unauthenticated.');
    }
}
