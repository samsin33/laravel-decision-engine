<?php

namespace Samsin33\DecisionEngine\Facades;

use Illuminate\Support\Facades\Facade;

class DecisionEngineFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'decisionEngine';
    }
}
