<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Role' => 'Akhmad\LaravelAdminCore\Policies\RolePolicy',
        'App\Models\Permission' => 'Akhmad\LaravelAdminCore\Policies\PermissionPolicy',
        'App\Models\User' => 'Akhmad\LaravelAdminCore\Policies\UserPolicy',
        'Akhmad\LaravelCategory\Models\Category' => 'Akhmad\LaravelAdminCore\Policies\CategoryPolicy',
        'Akhmad\LaravelCategory\Models\CategoryType' => 'Akhmad\LaravelAdminCore\Policies\CategoryTypePolicy',
        'Akhmad\LaravelMenu\Models\Menu' => 'Akhmad\LaravelAdminCore\Policies\MenuPolicy',
        'Akhmad\LaravelMenu\Models\MenuItem' => 'Akhmad\LaravelAdminCore\Policies\MenuItemPolicy',
        'Plank\Mediable\Media' => 'Akhmad\LaravelAdminCore\Policies\MediaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super-Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole(config('admin.roles.super_admin'))) {
                return true;
            }
        });
    }
}
