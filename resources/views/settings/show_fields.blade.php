<table class="datatables table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nomination Start Date</th>
            <th>Nomination End Date</th>
            <th>Voting Start Date</th>
            <th>Voting End Date</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $setting->id }}</td>
            <td>{{ $setting->nomination_start_date->format('Y-m-d') }}</td>
            <td>{{ $setting->nomination_end_date->format('Y-m-d') }}</td>
            <td>{{ $setting->voting_start_date->format('Y-m-d') }}</td>
            <td>{{ $setting->voting_end_date->format('Y-m-d') }}</td>
            <td>{{ $setting->created_at->format('Y-m-d') }}</td>
            <td>{{ $setting->updated_at->format('Y-m-d') }}</td>
        </tr>
    </tbody>
</table>
