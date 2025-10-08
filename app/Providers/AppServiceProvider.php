<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\Activity;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Filament\Support\Facades\FilamentView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // enforce morph map for all models
        \Illuminate\Database\Eloquent\Relations\Relation::enforceMorphMap([
            'activity'   => Activity::class,
            'user'       => User::class,
            'role'       => Role::class,
            'permission' => Permission::class,
        ]);

        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            fn (): View => view('filament.pages.google-login'),
        );
    }
}
