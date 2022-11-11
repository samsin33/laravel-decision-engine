@if(Session::has('success'))
    {{ Session::get('success') }}
@elseif($rule_engine->getErrors())
    @foreach ($rule_engine->getErrors()->all() as $error)
        {{ $error }}<br />
    @endforeach
@endif
<div><a href="{{ route('decision-engine.rule-engines.index') }}">Rule Engines List</a></div>
<form action="{{ empty($rule_engine->id) ? route('decision-engine.rule-engines.store') : route('decision-engine.rule-engines.update', $rule_engine->id) }}" method="post">
    @if(!empty($rule_engine->id))
        @method('PUT')
    @endif
    @csrf
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
        <div class="col-md-6">
            <label>Status</label>
            <select name="rule_engine[status]">
                <option value="0" {{ $rule_engine->status != 1 ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ $rule_engine->status == 1 ? 'selected' : '' }}>Active</option>
            </select>
        </div>
        <div class="col-md-6" />
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
    <input type="submit" value="Submit">
</form>
