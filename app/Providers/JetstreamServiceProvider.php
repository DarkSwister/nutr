<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('vendor.jetstream.components.'.$component, 'jet-'.$component);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        RedirectResponse::macro('banner', function ($message) {
            return $this->with('flash', [
                'bannerStyle' => 'success',
                'banner' => $message,
            ]);
        });

        RedirectResponse::macro('dangerBanner', function ($message) {
            return $this->with('flash', [
                'bannerStyle' => 'danger',
                'banner' => $message,
            ]);
        });
    }



    /**
     * Configure the Jetstream Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('action-message');
            $this->registerComponent('action-section');
            $this->registerComponent('application-logo');
            $this->registerComponent('application-mark');
            $this->registerComponent('authentication-card');
            $this->registerComponent('authentication-card-logo');
            $this->registerComponent('banner');
            $this->registerComponent('button');
            $this->registerComponent('confirmation-modal');
            $this->registerComponent('confirms-password');
            $this->registerComponent('danger-button');
            $this->registerComponent('dialog-modal');
            $this->registerComponent('dropdown');
            $this->registerComponent('dropdown-link');
            $this->registerComponent('form-section');
            $this->registerComponent('input');
            $this->registerComponent('checkbox');
            $this->registerComponent('input-error');
            $this->registerComponent('label');
            $this->registerComponent('modal');
            $this->registerComponent('nav-link');
            $this->registerComponent('responsive-nav-link');
            $this->registerComponent('responsive-switchable-team');
            $this->registerComponent('secondary-button');
            $this->registerComponent('section-border');
            $this->registerComponent('section-title');
            $this->registerComponent('switchable-team');
            $this->registerComponent('validation-errors');
            $this->registerComponent('welcome');
        });
    }

}
