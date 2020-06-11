<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('servicecenter') || $request->is('servicecenter/*')) {
            return redirect()->guest('/login/servicecenter');
        }
        if ($request->is('wholesaler') || $request->is('wholesaler/*')) {
            return redirect()->guest('/login/wholesaler');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
