<?php

namespace Samsin33\DecisionEngine;

use Samsin33\DecisionEngine\Models\RuleEngine;
use Samsin33\DecisionEngine\Models\RuleExecution;

class DecisionEngine
{
    /**
     * The DecisionEngine version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Indicates if DecisionEngine migrations will be run.
     *
     * @var bool
     */
    public static bool $runsMigrations = true;

    /**
     * Indicates if DecisionEngine routes will be registered.
     *
     * @var bool
     */
    public static bool $registersRoutes = true;

    /**
     * The rule engine model class name.
     *
     * @var string
     */
    public static string $ruleEngineModel = 'Samsin33\DecisionEngine\Models\RuleEngine';

    /**
     * The auth code model class name.
     *
     * @var string
     */
    public static string $ruleExecutionModel = 'Samsin33\DecisionEngine\Models\RuleExecution';

    /**
     * Configure DecisionEngine to not register its migrations.
     *
     * @return static
     */
    public static function ignoreMigrations(): static
    {
        static::$runsMigrations = false;
        return new static;
    }

    /**
     * Configure DecisionEngine to not register its routes.
     *
     * @return static
     */
    public static function ignoreRoutes(): static
    {
        static::$registersRoutes = false;
        return new static;
    }

    /**
     * Set the rule engine model class name.
     *
     * @param string $ruleEngineModel
     * @return void
     */
    public static function useRuleEngineModel(string $ruleEngineModel): void
    {
        static::$ruleEngineModel = $ruleEngineModel;
    }

    /**
     * Get the rule engine model class name.
     *
     * @return string
     */
    public static function ruleEngineModel(): string
    {
        return static::$ruleEngineModel;
    }

    /**
     * Get a rule engine code model instance.
     *
     * @param array $data
     * @return RuleEngine
     */
    public static function ruleEngine(array $data = []): RuleEngine
    {
        return new static::$ruleEngineModel($data);
    }

    /**
     * Set the rule execution model class name.
     *
     * @param string $ruleExecutionModel
     * @return void
     */
    public static function useRuleExecutionModel(string $ruleExecutionModel): void
    {
        static::$ruleExecutionModel = $ruleExecutionModel;
    }

    /**
     * Get the rule execution model class name.
     *
     * @return string
     */
    public static function ruleExecutionModel(): string
    {
        return static::$ruleExecutionModel;
    }

    /**
     * Get a new rule execution model instance.
     *
     * @param array $data
     * @return RuleExecution
     */
    public static function ruleExecution(array $data = []): RuleExecution
    {
        return new static::$ruleExecutionModel($data);
    }
}
