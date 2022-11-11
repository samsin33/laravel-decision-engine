<div class="col-md-12"><h1>Rule Engines List</h1></div>
<div>
    <div><a href="{{ route('decision-engine.rule-engines.create') }}">Create Rule Engine</a></div>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rule_engines as $rule_engine)
            <tr>
                <td>{{ $rule_engine->name }}</td>
                <td>{{ config('decision-engine.types')[$rule_engine->type] ?? '' }}</td>
                <td>{{ $rule_engine->status }}</td>
                <td>
                    <a href="{{ route('decision-engine.rule-engines.show', $rule_engine->id) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
