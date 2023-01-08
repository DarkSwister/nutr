<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class HasGroup
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
            !$request->user()->hasGroup()) {
            return $request->expectsJson()
                ? abort(403, 'You Must Be Part Of Group')
                : Redirect::guest(URL::route($redirectToRoute ?: 'groups.choose'));
        }
        if (!session('group_id')) {
            session(['group_id' => auth()->user()->groups()->first()->id]);
        }
        return $next($request);
    }
}
