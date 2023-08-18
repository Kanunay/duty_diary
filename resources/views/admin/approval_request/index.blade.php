@extends('layouts.admin')

@section('content')

<section class="vh" style="background-color: #eee;">
    <div class="row d-flex justify-content-center align-items-center h-200">
        <div class="col col-lg-11 col-x2-7">
            <div class="card rounded-3">
                <div class="card-body p-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-12 p-3">
                                <h2><i class="fas fa-solid fa-users no-decoration mx-1"></i> Approval Request</h2>
                            </div>
                        </div>
                    </div>

                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Date Made</th>
                                <th scope="col">EOD report by:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diaries as $diary)
                                @if ($diary->status === 1)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <button class="btn btn-success change-status-btn" data-id="{{ $diary->id }}">Approve</button>
                                        </td>
                                        <td><h5>End of day report: {{ $diary->created_at->format('F d, Y') }}</h5></td>
                                        <td>
                                            @if ($user = $users->find($diary->author_id))
                                                {{ $user->name }}
                                            @else
                                                User Not Found
                                            @endif
                                        </td>
                                    </tr>
                                @elseif ($diary->status === 2)
                                    {{-- Do nothing or display alternative content for status 2 --}}
                                @endif
                            @endforeach

                        {{-- {{ $diary->status }} --}}
                        </tbody>
                    </table>

                    <!-- Success message -->
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (session('message'))
            
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('.change-status-btn').click(function () {
            var diaryId = $(this).data('id');
            
            $.ajax({
                url: "{{ route('diaries.changeStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: diaryId
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Diary Entry Approved!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Refresh the page
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            });
        });
    });
</script>





@endsection
