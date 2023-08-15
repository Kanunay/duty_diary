
<table class="table mb-4" id="users-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Actions</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
</table>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("users.data") }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
            ],
            order: [[3, 'asc']]
        });
    });
</script>
@endpush
