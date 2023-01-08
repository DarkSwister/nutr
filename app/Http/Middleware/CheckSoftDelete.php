<?php

namespace App\Http\Middleware;

use App\Domains\Auth\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CheckSoftDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request?->user();
        $email = Str::lower(trim(htmlspecialchars($request->input('email'))));
        if($email && !$user) {
            $user = User::where('email', $email)->first();
        }
        if ($user) {
            if($user->trashed() || !$user->isActive()) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                return $request->expectsJson()
                    ? abort(401, 'Your user is suspended!')
                    : Redirect::guest(URL::route('auth.login'));
            }
        }

        return $next($request);
    }
}
