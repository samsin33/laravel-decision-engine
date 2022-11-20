<div class="col-md-12"><h1>Rule Executions List</h1></div>
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
                <td><a href="{{ route('decision-engine.rule-engines.show', $rule_execution->ruleEngine->id) }}">{{ $rule_execution->ruleEngine->name }}</a></td>
                <td>{{ $rule_execution->status }}</td>
                <td>
                    <a href="{{ route('decision-engine.rule-executions.show', $rule_execution->id) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $rule_executions->links() }}
</div>
