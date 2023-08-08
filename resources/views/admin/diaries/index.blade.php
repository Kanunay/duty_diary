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
                              Diaries
                          </div>
                          <div class="col-md-6 col-12 text-right">
                              <a href="" class="btn btn-sm btn-primary ">Add User</a>
                          </div>
                      </div>
                  </div>

                  <table class="table mb-4">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Actions</th>
                              <th scope="col">Title</th>
                              <th scope="col">Status</th>   
                          </tr>
                      </thead>
                      <tbody>
                          
                      </tbody>
                  </table>

              </div>
          </div>
      </div>
  </div>
  
</section>
@endsection