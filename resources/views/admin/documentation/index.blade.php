@extends('layouts.admin')

@section('content')

<section class="vh-100" style="background-color: #eee;">
  <div class="row d-flex justify-content-center align-items-center h-200">
      <div class="col col-lg-11 col-x2-7">
          <div class="card rounded-3">
              <div class="card-body p-4">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6 col-12">
                              <i class="fas fa-solid fa-users"></i>
                              Documentations
                          </div>
                          <div class="col-md-6 col-12 text-right">
                              <a href="{{ route('documentations.create') }}" class="btn btn-sm btn-primary">Add Documentation</a>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      @foreach ($documentations as $documentation)
                      <div class="col-md-4 mb-4">
                          <div class="card">
                              <img src="{{ asset('storage/app/public/images' . $documentation->image) }}" class="card-img-top" alt="Documentation Image">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $documentation->caption }}</h5>
                              </div>
                              <div class="card-footer">
                                  <form action="{{ route('documentations.destroy', $documentation->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>

              </div>
          </div>
      </div>
  </div>
</section>

@endsection
