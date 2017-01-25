<?php

namespace Yk\LaravelBenchmark;

use Illuminate\Support\ServiceProvider;

class LaravelBenchmarkProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Register commands, so you may execute them using the Artisan CLI.
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Yk\LaravelBenchmark\App\Console\Commands\Benchmark::class,
            ]);
        }
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
