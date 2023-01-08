<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ConfirmPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\DisableTwoFactorAuthenticationController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\LoginController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\PasswordExpiredController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\RegisterController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\SocialController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\TwoFactorAuthenticationController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\UpdatePasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\VerificationController;
use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::get('setup', \App\Http\Livewire\User\Settings\UserSetup::class)->middleware(['auth', config('boilerplate.access.middleware.verified')])->name('user.setup');

Route::group(['middleware' => ['auth', config('boilerplate.access.middleware.verified'),'hasSetup']], function () {
    Route::get('/', \App\Http\Livewire\User\MealPlanner::class)->name('meal');

    Route::get('invitation/approve', \App\Http\Livewire\Group\GroupChoose::class)->name('invitation.approve');
    Route::get('group/switch/{group}', [\App\Http\Controllers\GroupController::class, 'switch'])->name('group.switch');
    Route::get('group/choose', \App\Http\Livewire\Group\GroupChoose::class)->name('groups.choose');

    Route::group(['middleware' => 'hasGroup'], function () {
        Route::get('recipe/random', [\App\Http\Controllers\RecipeController::class, 'randomRecipe'])->name('recipes.random');
        Route::get('recipe/{recipe:slug}', \App\Http\Livewire\Recipe\RecipeModel::class)->name('recipe.show');
        Route::get('recipes', \App\Http\Livewire\Recipe\Recipes::class)->name('recipes.index');
        Route::get('tags', \App\Http\Livewire\Tag\Tags::class)->name('tags.index');
        Route::get('categories', \App\Http\Livewire\Category\Categories::class)->name('categories.index');


    });
});

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    /*
     * Frontend Access Controllers
     * All route names are prefixed with 'frontend.auth'.
     */
    Route::group(['as' => 'auth.'], function () {
        Route::group(['middleware' => 'auth'], function () {

            // Authentication
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');

            // Password expired routes
            Route::get('password/expired', [PasswordExpiredController::class, 'expired'])->name('password.expired');
            Route::patch('password/expired', [PasswordExpiredController::class, 'update'])->name('password.expired.update');

            // These routes can not be hit if the password is expired
            Route::group(['middleware' => 'password.expires'], function () {
                // E-mail Verification
                Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
                Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
                    ->name('verification.verify')
                    ->middleware(['signed', 'throttle:6,1']);
                Route::post('email/resend', [VerificationController::class, 'resend'])
                    ->name('verification.resend')
                    ->middleware('throttle:6,1');

                // These routes require the users email to be verified
                Route::group(['middleware' => config('boilerplate.access.middleware.verified')], function () {
                    // Passwords
                    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
                    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

                    Route::patch('password/update', [UpdatePasswordController::class, 'update'])->name('password.change');

                    // Two-factor Authentication
                    Route::group(['prefix' => 'profile-settings/2fa', 'as' => 'account.2fa.'], function () {

                        Route::group(['middleware' => '2fa:enabled'], function () {
                            Route::get('recovery', [TwoFactorAuthenticationController::class, 'show'])
                                ->name('show')
                                ->breadcrumbs(function (Trail $trail) {
                                    $trail->parent('frontend.user.account')
                                        ->push(__('Two Factor Recovery Codes'), route('frontend.auth.account.2fa.show'));
                                });
                            Route::patch('recovery/generate', [TwoFactorAuthenticationController::class, 'update'])->name('update');
                        });
                    });
                });
            });
        });

        Route::group(['middleware' => 'guest'], function () {
            // Authentication
            Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [LoginController::class, 'login']);

            // Registration


            Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('register', [RegisterController::class, 'register']);

            // Password Reset
            Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
            Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
            Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
            Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

            // Socialite Routes
            Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.login');
            Route::get('login/{provider}/callback', [SocialController::class, 'callback']);
        });
    });

    /*
     * These frontend controllers require the user to be logged in
     * All route names are prefixed with 'frontend.'
     * These routes can not be hit if the user has not confirmed their email
     */
    Route::group(['as' => 'user.', 'middleware' => ['auth:web', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
        Route::get('dashboard', [StaterkitController::class, 'home'])
            ->middleware('is_user')
            ->name('dashboard');


        Route::get('profile', [ProfileController::class, 'profile'])
            ->name('profile');

        Route::group(['prefix' => 'profile-settings'], function () {
            Route::get('/', \App\Http\Livewire\User\Settings\ProfileSettings::class)
                ->name('profile-settings');
            Route::get('/security', \App\Http\Livewire\User\Settings\ProfileSecurity::class)
                ->name('profile-security');
        });


        Route::get('account', [AccountController::class, 'index'])
            ->name('account');

        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::redirect('/', '/admin/dashboard', 301);

    Route::get('/platform-users', [StaterkitController::class, 'platform_users'])->name('platform-users');

});

Route::get('/platform-users', [StaterkitController::class, 'platform_users'])->name('platform-users');

Route::get('/home', [StaterkitController::class, 'home'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('/demo/{type?}', [StaterkitController::class, 'demo'])->name('demo');

Route::get('setting/theme/{type}', [StaterkitController::class, 'setting']);

