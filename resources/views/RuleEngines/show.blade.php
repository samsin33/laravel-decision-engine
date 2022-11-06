<div class="col-md-12">
    <div class="col-md-6">
        <label>Name</label>
        <span>{{ $rule_engine->name }}</span>
    </div>
    <div class="col-md-6">
        <label>Type</label>
        <span>{{ config('decision-engine.types')[$rule_engine->type] }}</span>
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
