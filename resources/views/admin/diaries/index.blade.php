@extends('layouts.admin')

@section('content')

<div class="container">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Action</th>
                <th>Tittle</th>
                <th>Status</th>
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
            ajax: "{{ route('diaries.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {
                    data: 'created_at', name: 'created_at',
                    render: function (data, type, row) {
                        // Format the 'created_at' date and display it as "Month Day, Year"
                        var formattedDate = new Date(data).toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                        return '<h2 class="text-gray-500 dark:text-gray-400">EOD Report ' + formattedDate;
                    }
                },
                {
                    data: 'status', name: 'status', render: function (data, type, row) {
                        var statusText, statusClass;

                        switch (data) {
                            case 1:
                                statusText = "Pending";
                                statusClass = "btn-warning";
                                break;
                            case 2:
                                statusText = "Approved";
                                statusClass = "btn-success";
                                break;
                            default:
                                statusText = "404";
                                statusClass = "btn-danger";
                                break;
                        }

                        return '<button class="btn ' + statusClass + ' text-white">' + statusText + '</button>';
                    }
                },
            ],
            initComplete: function () {
                $('.dataTables_filter').append('<a href="{{ route('diaries.create') }}" class="btn mx-2 mb-1 btn-primary text-white">Add Diary</a>');
            }
        });
    });
</script>



  


@endsection
