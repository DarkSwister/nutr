<?php

namespace App\Http\Controllers\Frontend\User;

/**
 * Class AccountController.
 */
class AccountController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    public function profile(){
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Profile"]
        ];
        return view('frontend.user.profile', ['breadcrumbs' => $breadcrumbs]);
    }
}
