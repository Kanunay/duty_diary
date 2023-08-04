@extends('layouts.admin')
@section('content')


<div class="container">
    <form action="{{ route('documentations.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <input type="file" class="dropify" data-height="150" data-allowed-file-extensions="jpg jpeg png gif" name="image" />
            <input type="text" name="caption" id="caption">
        </div>
        <div class="card-footer">
            <input type="submit" value="Save">
        </div>
    </form>



    <div class="mt-5">
        <h2>Documentations</h2>
        <div class="row">
            @foreach($documentations as $documentation)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $documentation->image) }}" class="card-img-top" alt="Documentation Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $documentation->caption }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('admin.documentation.partials._dropify')
@endsection
