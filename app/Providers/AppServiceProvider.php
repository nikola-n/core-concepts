<?php

namespace App\Providers;

use App\Example;
use App\Collaborator;
use App\Utilities\Filter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // TODO Service Providers
        // So bind se dobivaat dve razlicni instanci na objekti
        // So singleton se instancira istiot objekt
        // When the app is booted firstly laravel will register all of the service providers
        // (it will call the register methods on all of them)
        // and when all of them are finished
        // the boot method is invoked
        $this->app->singleton('App\Example', function () {
            $collaborator = new Collaborator();
            $foo = 'foobar';
            return new Example($collaborator, $foo);
        });

        // Custom Facade
        $this->app->bind('filter', function () {
            return new Filter();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
