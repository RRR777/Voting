<table class="datatables table table-responsive table-striped table-hover">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Nomination Id</th>
            <th>Category Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votings as $voting)
            <tr>
                <td>{{ $voting->user_id }}</td>
                <td>{{ $voting->nomination_id }}</td>
                <td>{{ $voting->category_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
