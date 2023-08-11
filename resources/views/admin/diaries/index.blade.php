@extends('layouts.admin')

@section('content')

<section class="vh" style="background-color: #eee;">
    <div class="row d-flex justify-content-center align-items-center h-200">
        <div class="col col-lg-11 col-x2-7">
            <div class="card rounded-3">
                <div class="card-body p-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <i class="fas fa-solid fa-users"></i>
                                Diaries
                            </div>
                            <div class="col-md-6 col-12 text-right">
                                <a href="{{ route('diaries.create') }}" class="btn btn-sm btn-primary text-white">Add Diary</a>
                            </div>
                        </div>
                    </div>

                    <table class="table mb-4" id="diaries-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diaries as $diary)
                                <tr>
                                    <td>{{ $diary->id }}</td>
                                    <td>
                                        <a href="{{ route('diaries.show', $diary->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                    <td>{{ $diary->title }}</td>
                                    <td>{{ $diary->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(function () {
        $('#diaries-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("diaries.index") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
            ]
        });
    });
</script>
@endpush

@endsection
