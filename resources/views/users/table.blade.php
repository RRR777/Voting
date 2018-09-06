<table class="datatables table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Nickname</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->nickname }}</td>
                <td>
                    {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>',
                                ['type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')"
                            ]) }}
                        </div>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Nickname</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
