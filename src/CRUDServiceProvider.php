<?php

namespace Laralum\CRUD;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Laralum\CRUD\Policies\ViewPolicy;
use Laralum\Permissions\PermissionsChecker;

class CRUDServiceProvider extends ServiceProvider
{

    /**
     * The mandatory permissions for the module.
     *
     * @var array
     */
    protected $permissions = [
        [
            'name' => 'CRUD Access',
            'slug' => 'laralum::CRUD.access',
            'desc' => "Grants access to laralum/CRUD module",
        ]
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadViewsFrom(__DIR__.'/Views', 'laralum_CRUD');
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_CRUD');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // Make sure the permissions are OK
        PermissionsChecker::check($this->permissions);

    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        // foreach ($this->policies as $key => $value) {
        //     Gate::policy($key, $value);
        // }
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
