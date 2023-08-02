@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        New Documentation
    </div>
    <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="caption">Caption</label>
                    <input type="text" class="form-control" id="caption" placeholder="Caption" name="caption" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="p-0 m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
            <a href="{{ route('documentations.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
