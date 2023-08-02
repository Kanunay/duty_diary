@extends('layouts.admin')

@section("content")

<section class="vh" style="background-color: #eee;">
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
                                  <!-- Form to trigger the delete action -->
                                  <button class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>

                                  
                                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success ms-1 mx-3">Edit</a>
                              </td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                @if($user->role_id === 1)
                                  <span class="btn badge-danger">Administrator</span>
                                @elseif($user->role_id === 2)
                                  <span class="btn badge-warning">Supervisor</span>
                                @else
                                  <span class="btn badge-secondary">Trainee</span>
                                @endif
                                
                              </td>
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
