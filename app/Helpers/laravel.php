<?php

/**
 * @param \Illuminate\Http\Request $request
 * @return array
 */
function get_api_token_from_request($request) {
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
    return $api_token;
}

/**
 * @param string $routeName
 * @return string
 */
function is_active_menu($routeName) {
    return Request::route()->getName() == $routeName ? 'active' : '';
}