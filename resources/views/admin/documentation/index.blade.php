@extends('layouts.admin')
@section('content')


<div class="container">
    
    @include('admin.documentation.partials._modal')


    <div class="mt-5">
        <h2>Documentations</h2>
        <div class="row">
            @foreach($documentations as $documentation)
            <div class="col-md-4 mb-3">
                <a href="{{ asset('storage/' . $documentation->image) }}" data-lightbox="image-gallery">
                    <div class="card">
                        <img src="{{ asset('storage/' . $documentation->image) }}" class="card-img-top" alt="Documentation Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $documentation->caption }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('admin.documentation.partials._dropify')



@endsection
