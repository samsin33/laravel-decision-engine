<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rule_engines as $rule_engine)
            <tr>
                <td>{{ $rule_engine->name }}</td>
            </tr>
            <tr>
                <td>{{ config('decision-engine.types')[$rule_engine->type] ?? '' }}</td>
            </tr>
            <tr></tr>
        @endforeach
        </tbody>
    </table>
</div>
