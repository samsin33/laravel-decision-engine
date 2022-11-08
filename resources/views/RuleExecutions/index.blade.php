<div>
    <table>
        <thead>
        <tr>
            <th>Rule Engine</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rule_executions as $rule_execution)
            <tr>
                <td><a href="{{ route('decision-engine.rule-engines.show', $rule_execution->$rule_engine->id) }}">{{ $rule_execution->$rule_engine->name }}</a></td>
            </tr>
            <tr>
                <td>{{ $rule_engine->status }}</td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('decision-engine.rule-executions.show', $rule_execution->id) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
