<div class="col-md-12"><h1>Rule Execution</h1></div>
<div><a href="{{ route('decision-engine.rule-executions.index') }}">Rule Executions List</a></div>
<div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label>Rule Engine</label>
            <span><a href="{{ route('decision-engine.rule-engines.show', $rule_execution->ruleEngine->id) }}" target="_blank">{{ $rule_execution->ruleEngine->name }}</a></span>
        </div>
        <div class="col-md-6">
            <label>Status</label>
            <span>{{ $rule_execution->status }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label>Created At</label>
            <span>{{ $rule_execution->created_at }}</span>
        </div>
        <div class="col-md-6">
            <label>Updated At</label>
            <span>{{ $rule_execution->updated_at }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label>Input</label>
        </div>
        <div class="col-md-9">
            <span>
                {{ json_encode($rule_execution->input) }}
            </span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label>Output</label>
        </div>
        <div class="col-md-9">
            <span>
                {{ $rule_execution->output }}
            </span>
        </div>
    </div>
</div>
<div class="col-md-12"><h1>Rule Execution Logs</h1></div>
<div>
    @foreach($rule_execution->ruleExecutionLogs as $rule_execution_log)
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Created At</label>
                <span>{{ $rule_execution_log->created_at }}</span>
            </div>
            <div class="col-md-6">
                <label>Updated At</label>
                <span>{{ $rule_execution_log->updated_at }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3">
                <label>Previous Attributes</label>
            </div>
            <div class="col-md-9">
            <span>
                {{ $rule_execution_log->previous_attributes }}
            </span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3">
                <label>New Attributes</label>
            </div>
            <div class="col-md-9">
            <span>
                {{ $rule_execution_log->new_attributes }}
            </span>
            </div>
        </div>
  @endforeach
</div>
