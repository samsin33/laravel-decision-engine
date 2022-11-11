<?php

use Illuminate\Support\Facades\Route;
use Samsin33\DecisionEngine\Http\Controllers\RuleExecutionsController;

Route::middleware(config('decision-engine.api_guards'))->group(function () {
    Route::resource('rule-executions', RuleExecutionsController::class)->only(['store']);
});
