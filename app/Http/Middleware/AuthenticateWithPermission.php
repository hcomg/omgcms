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
        // Find api_token from request
        $api_token = [];
        if ($token = $request->get('api_token')) {
            if (!in_array($token, $api_token)) {
                $api_token[] = $token;
            }
        }
        if ($token = $request->header('Authorization')) {
            $token = str_replace('Bearer ', '', $token);
            if (!in_array($token, $api_token)) {
                $api_token[] = $token;
            }
        }
        // Find user with api_token
        $user = User::whereIn('api_token', $api_token)->first();

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
