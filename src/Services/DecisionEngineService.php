<?php

namespace Samsin33\DecisionEngine\Services;

use Illuminate\Support\Facades\Validator;
use Samsin33\DecisionEngine\Models\RuleExecution;

class DecisionEngineService
{
    /**
     * @var $validate
     */
    private $validate = null;

    /**
     * @var array
     */
    private array $input;

    /**
     * @var $rule_engine
     */
    private $rule_engine = null;

    /**
     * @var RuleExecution $rule_execution
     */
    private RuleExecution $rule_execution;

    /**
     * @param RuleExecution $rule_execution
     */
    public function __construct(RuleExecution $rule_execution)
    {
        $this->rule_execution = $rule_execution;
        $this->input = $rule_execution->input;
        $this->rule_engine = $rule_execution->rule_engine;
    }

    /**
     * @return bool
     */
    public function validateInput(): bool
    {
        $this->validate = Validator::make($this->input, $this->rule_engine->validation);
        if ($this->validate->fails()) {
            return false;
        }
        return true;
    }

    /**
     * @return array
     */
    public function processInput(): array
    {
        $executeProcess = new RuleProcessService($this->rule_execution);
        if (!$this->rule_engine) {
            $result = [
                'status' => 'Invalid Rule Engine',
                'output' => "Rule Engine {$this->rule_engine->name} does not exist.",
            ];
            $executeProcess->updateRuleExecution($result);
        } elseif (!$this->validateInput()) {
            $result = [
                'status' => 'Validation Failed',
                'output' => $this->validate->errors()->toArray(),
            ];
            $executeProcess->updateRuleExecution($result);
        } else {
            $result = $executeProcess->executeProcess();
        }
        return $result;
    }
}
