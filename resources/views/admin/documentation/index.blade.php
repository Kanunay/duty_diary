@extends('layouts.admin')
@section('content')

<form action="{{route('documentations.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <input type="file" class="dropify" data-height="150" data-allowed-file-extensions="jpg jpeg png gif" name="image" />
            <input type="text" name="caption" id="caption">
        </div>
        <div class="card-footer">
            <input type="Submit" value="Save">
        </div>
    </form>
  
</section>
@include('admin.documentation.partials._dropify')
@endsection
