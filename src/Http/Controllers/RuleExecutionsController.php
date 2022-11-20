<?php

namespace Samsin33\DecisionEngine\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Samsin33\DecisionEngine\DecisionEngine;
use Samsin33\DecisionEngine\Services\DecisionEngineService;

class RuleExecutionsController extends Controller
{
    public function index(Request $request)
    {
        $rule_executions = DecisionEngine::ruleExecutionModel()::paginate(config('decision-engine.pagination_size'));
        return view('decision-engine::RuleExecutions.index', compact('rule_executions'));
    }

    public function store(Request $request)
    {
        $rule_execution = DecisionEngine::ruleExecution($request->rule_execution);
        if ($rule_execution->save()) {
            $decision_engine_service = new DecisionEngineService($rule_execution);
            $result = $decision_engine_service->processInput();
            return response()->json(['output' => $result, 'rule_execution' => $rule_execution]);
        } else {
            return response()->json($rule_execution->getErrors()->toArray(), 422);
        }
    }

    public function show(Request $request, $id)
    {
        $rule_execution = DecisionEngine::ruleExecutionModel()::with(['ruleExecutionLogs'])->findOrFail($id);
        return view('decision-engine::RuleExecutions.show', compact('rule_execution'));
    }
}
