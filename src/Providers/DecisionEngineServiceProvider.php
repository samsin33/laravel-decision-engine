<?php

namespace Samsin33\DecisionEngine\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Samsin33\DecisionEngine\DecisionEngine;
use Samsin33\DecisionEngine\Models\RuleEngineUuid;
use Samsin33\DecisionEngine\Models\RuleExecutionLogUuid;
use Samsin33\DecisionEngine\Models\RuleExecutionUuid;

class DecisionEngineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRoutes();
        $this->registerMigrations();
        $this->registerPublishing();
        $this->registerResources();
        if (config('decision-engine.db_primary_key_type') == 'uuid') {
            DecisionEngine::useRuleEngineModel(RuleEngineUuid::class);
            DecisionEngine::useRuleExecutionModel(RuleExecutionUuid::class);
            DecisionEngine::useRuleExecutionLogModel(RuleExecutionLogUuid::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->configure();
    }

    /**
     * Set up the configuration for Decision Engine.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/decision-engine.php', 'decision-engine'
        );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        if (DecisionEngine::$registersRoutes) {
            Route::group([
                'prefix' => config('decision-engine.path'),
                'namespace' => 'Samsin33\DecisionEngine\Http\Controllers',
                'as' => 'decision-engine.',
            ], function () {
                $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
                $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
            });
        }
    }

    /**
     * Register the package resources.
     *
     * @return void
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'decision-engine');
    }

    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations(): void
    {
        if (DecisionEngine::$runsMigrations && $this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/decision-engine.php' => $this->app->configPath('decision-engine.php'),
            ], 'decision-engine-config');

            $this->publishes([
                __DIR__ . '/../../database/migrations' => $this->app->databasePath('migrations'),
            ], 'decision-engine-migrations');

            $this->publishes([
                __DIR__ . '/../../resources/views' => $this->app->resourcePath('views/vendor/decision-engine'),
            ], 'decision-engine-views');
        }
    }
}
