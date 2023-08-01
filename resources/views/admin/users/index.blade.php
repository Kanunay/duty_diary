@extends('layouts.admin')

@section("content")

<section class="vh-100" style="background-color: #eee;">
  <div class="row d-flex justify-content-center align-items-center h-200">
      <div class="col col-lg-11 col-x2-7">
          <div class="card rounded-3">
              <div class="card-body p-4">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6 col-12">
                              <i class="fas fa-solid fa-users"></i>
                              Users
                          </div>
                          <div class="col-md-6 col-12 text-right">
                              <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add User</a>
                          </div>
                      </div>
                  </div>

                  <table class="table mb-4">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Actions</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <th scope="row">{{ $loop->index + 1 }}</th>
                              <td>
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  <button type="submit" class="btn btn-success ms-1 mx-3"> Edit </button>
                              </td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role_id }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>

              </div>
          </div>
      </div>
  </div>
</section>

  
@endsection
