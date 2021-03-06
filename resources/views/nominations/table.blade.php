<table class="datatables table table-responsive table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Business Name</th>
            <th>Nominations</th>
            <th>Selected?</th>
            <th>Won?</th>
            <th>Category</th>
{{--             <th colspan="3">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($nominations as $nomination)
            <tr>
                <td>
                    <a href="{{ route('nominations.show', [$nomination->id]) }}"><b>{{ $nomination->name }}</b></a>
                    ({{ $nomination->gender }})
                </td>
                <td>{{ $nomination->business_name }}</td>
                <td>{{ $nomination->no_of_nominations }}</td>
                <td>{{ $nomination->is_admin_selected == 1 ? "yes" : "no"}}</td>
                <td>{{ $nomination->is_won == 1 ? "yes" : "no"}}</td>
                <td>{{ isset($nomination->category->name) ? $nomination->category->name : null }}</td>
{{--                 <td>
                    {{ Form::open(['route' => ['nominations.destroy', $nomination->id], 'method' => 'delete']) }}
                        <div class='btn-group'>
                            <a href="{{ route('nominations.show', [$nomination->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('nominations.edit', [$nomination->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) }}
                        </div>
                    {{ Form::close() }}
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
