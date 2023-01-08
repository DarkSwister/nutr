<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class HasSetup
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {

        if (!$request->user() ||
            !$request->user()->isSetup()) {
            return $request->expectsJson()
                ? abort(403, 'You Must Complete Setup')
                : Redirect::guest(URL::route($redirectToRoute ?: 'user.setup'));
        }
        return $next($request);
    }
}
