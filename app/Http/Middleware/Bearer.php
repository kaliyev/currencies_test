<?php

namespace App\Http\Middleware;

use Closure;

class Bearer
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
        $header = $request->header("Authorization");

        if (strpos($header, "Bearer") === 0) {
            $bearer = "123456";
            $request_bearer = substr($header, 7);
            if ($request_bearer != $bearer) {
                return response()->json(['message' => 'Token not correct'], 403);
            }
        } else {
            return response()->json(['message' => 'Token not isset'], 401);
        }

        return $next($request);
    }
}
