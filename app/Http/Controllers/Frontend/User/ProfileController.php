<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

/**
 * Class ProfileController.
 */
class ProfileController
{

    public function profile(){
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Profile"]
        ];
        return view('frontend.user.profile', ['breadcrumbs' => $breadcrumbs]);
    }

    public function profileSettings(){
        $breadcrumbs = [
            ['link' => "", 'name' => "Home"], ['name' => "Profile Settings"]
        ];
        return view('frontend.user.profile-settings', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {
        $userService->updateProfile($request->user(), $request->validated());

        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
}
