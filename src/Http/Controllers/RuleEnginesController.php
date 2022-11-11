<?php

namespace Samsin33\DecisionEngine\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Samsin33\DecisionEngine\DecisionEngine;

class RuleEnginesController extends Controller
{
    public function index(Request $request)
    {
        $rule_engines = DecisionEngine::ruleEngineModel()::paginate(config('decision-engine.pagination_size'));
        return view('decision-engine::RuleEngines.index', compact('rule_engines'));
    }

    public function create(Request $request)
    {
        $rule_engine = DecisionEngine::ruleEngine();
        return view('decision-engine::RuleEngines.create', compact('rule_engine'));
    }

    public function store(Request $request)
    {
        $rule_engine = DecisionEngine::ruleEngine($request->rule_engine);
        if ($rule_engine->save()) {
            return redirect()->route('decision-engine.rule-engines.edit', $rule_engine->id)->with('success', 'Record saved successfully.');
        } else {
            return view('decision-engine::RuleEngines.create', compact('rule_engine'));
        }
    }

    public function show(Request $request, $id)
    {
        $rule_engine = DecisionEngine::ruleEngineModel()::findOrFail($id);
        return view('decision-engine::RuleEngines.show', compact('rule_engine'));
    }

    public function edit(Request $request, $id)
    {
        $rule_engine = DecisionEngine::ruleEngineModel()::findOrFail($id);
        return view('decision-engine::RuleEngines.create', compact('rule_engine'));
    }

    public function update(Request $request, $id)
    {
        $rule_engine = DecisionEngine::ruleEngineModel()::findOrFail($id);
        if ($rule_engine->update($request->rule_engine)) {
            return redirect()->route('decision-engine.rule-engines.edit', $rule_engine->id)->with('success', 'Record saved successfully.');
        } else {
            return view('decision-engine::RuleEngines.create', compact('rule_engine'));
        }
    }

    public function destroy(Request $request, $id)
    {
        $rule_engine = DecisionEngine::ruleEngineModel()::findOrFail($id);
        if ($rule_engine->delete()) {
            return redirect()->route('decision-engine.rule-engines.index')->with('success', 'Record deleted successfully.');
        } else {
            return redirect()->route('decision-engine.rule-engines.index')->with('errors', ['Something went wrong.']);
        }
    }
}
