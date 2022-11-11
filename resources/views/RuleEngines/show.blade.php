<div class="col-md-12"><h1>Rule Engine</h1></div>
<div><a href="{{ route('decision-engine.rule-engines.index') }}">Rule Engines List</a></div>
<div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label>Name</label>
            <span>{{ $rule_engine->name }}</span>
        </div>
        <div class="col-md-6">
            <label>Type</label>
            <span>{{ config('decision-engine.types')[$rule_engine->type] }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label>Status</label>
            <span>{{ $rule_engine->status }}</span>
        </div>
        <div class="col-md-6"></div>
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
            <label>Validation</label>
        </div>
        <div class="col-md-9">
            <span>
                {{ $rule_engine->validation }}
            </span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label>Business Rules</label>
        </div>
        <div class="col-md-9">
            <span>
                {{ $rule_engine->business_rules }}
            </span>
        </div>
    </div>
</div>
