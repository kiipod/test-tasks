<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\ContractorRepository;
use App\Repositories\Interfaces\ContractorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ContractorRepositoryInterface::class, ContractorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
