@extends('layouts.admin')

@section('content')
<section class="vh" style="background-color: #eee;">

        <div class="container">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
           
<script type="text/javascript">
    $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role_id', name: 'role_id', render: function(data, type, row) {
                switch (data) {
                    case 1:
                        return "Admin";
                    case 2:
                        return "Supervisor";
                    case 3:
                        return "Trainee";
                    default:
                        return "404";
                }
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            $('.dataTables_filter').append('<a href="{{ route("users.create") }}" class="btn text-white btn-primary ml-3">New User</a>');
        }
    });
});
</script>   
@endsection
