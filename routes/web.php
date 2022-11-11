<?php

use Illuminate\Support\Facades\Route;
use Samsin33\DecisionEngine\Http\Controllers\RuleEnginesController;
use Samsin33\DecisionEngine\Http\Controllers\RuleExecutionsController;

Route::middleware(config('decision-engine.web_guards'))->group(function () {
    Route::resources(['rule-engines' => RuleEnginesController::class]);
    Route::resource('rule-executions', RuleExecutionsController::class)->only(['index', 'show']);
});
