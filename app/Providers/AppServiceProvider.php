<?php

namespace App\Providers;

use App\Repositories\Interfaces\SubmissionRepository;
use App\Repositories\SubmissionRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        SubmissionRepository::class => SubmissionRepositoryEloquent::class,
    ];

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
        //
    }
}
