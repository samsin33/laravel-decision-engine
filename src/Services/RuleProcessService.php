<?php

namespace Samsin33\DecisionEngine\Services;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Samsin33\DecisionEngine\Models\RuleEngine;
use Samsin33\DecisionEngine\Models\RuleExecution;

class RuleProcessService
{
    /**
     * @var RuleExecution $rule_execution
     */
    private RuleExecution $rule_execution;

    /**
     * @var RuleEngine $rule_engine
     */
    private RuleEngine $rule_engine;

    /**
     * @param RuleExecution $rule_execution
     */
    public function __construct(RuleExecution $rule_execution)
    {
        $this->rule_execution = $rule_execution;
        $this->rule_engine = $this->rule_execution->ruleEngine;
    }

    private function getTypes()
    {
        return config('decision-engine.types');
    }

    /**
     * @return array
     */
    private function executeCode(): array
    {
        try {
            $data = $this->rule_execution->input;
            extract($data);
            $result = eval($this->rule_engine->business_rules);
            return [
                'status' => 'Code Success',
                'output' => $result,
            ];
        } catch (Exception $exception) {
            return [
                'status' => 'Code Execution Failure',
                'output' => $exception->getTraceAsString(),
            ];
        }
    }

    /**
     * @return array
     */
    private function executeCommand(): array
    {
        try {
            $data = $this->rule_execution->input;
            extract($data);
            $cmd = "{$this->rule_engine->business_rules}";
            $result = Artisan::call(eval('return "'.$cmd.'";'));
            $output = Artisan::output();
            return [
                'status' => 'Command Success',
                'output' => ['result' => $result, 'info' => $output]
            ];
        } catch (Exception $exception) {
            return [
                'status' => 'Command Execution Failure',
                'output' => $exception->getTraceAsString(),
            ];
        }
    }

    /**
     * @return array
     */
    public function executeProcess(): array
    {
        $execType = 'execute'.Str::ucfirst($this->rule_engine->type);
        try {
            $result = $this->$execType();
        } catch (Exception $exception) {
            $result = [
                'status' => 'Exception Rule Process Failure',
                'output' => $exception->getTraceAsString(),
            ];
        }
        $this->updateRuleExecution($result);
        return $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateRuleExecution(array $data): bool
    {
        return $this->rule_execution->update($data);
    }
}
