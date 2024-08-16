<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\MemberRepository;
use App\Repositories\MemberRepositoryInterface;
use App\Services\BookServices;
use App\Services\MemberServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(BookServices::class, function ($app) {
            return new BookServices($app->make(BookRepositoryInterface::class));
        });

        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
        $this->app->bind(MemberServices::class, function ($app) {
            return new MemberServices($app->make(MemberRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
