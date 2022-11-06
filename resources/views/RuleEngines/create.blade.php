<div class="col-md-12">
    <div class="col-md-6">
        <label>Name</label>
        <input name="rule_engine[name]" type="text" value="{{ $rule_engine->name }}" class="" />
    </div>
    <div class="col-md-6">
        <label>Type</label>
        <select name="rule_engine[type]">
            <option value="">Select Type...</option>
            @foreach(config('decision-engine.types') as $key => $value)
                <option value="{{ $key }}" {{ $rule_engine->type == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label>Validation</label>
        </div>
        <div class="col-md-9">
            <textarea name="rule_engine[validation]">{{ $rule_engine->validation }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <label>Business Rules</label>
        </div>
        <div class="col-md-9">
            <textarea name="rule_engine[business_rules]">{{ $rule_engine->business_rules }}</textarea>
        </div>
    </div>
</div>
