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
                          <a href="" class="btn btn-sm btn-primary">Add User</a>
                      </div>
                  </div>
              </div>


            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Caption</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <button type="submit" class="btn btn-success ms-1">Finished</button>
                    </td>
                  <td>Buy groceries for next week</td>
                  <td>In progress</td>
                  <td>Admin</td>
                </tr>

                  <th scope="row">2</th>
                  <td>
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <button type="submit" class="btn btn-success ms-1">Finished</button>
                    </td>
                  <td>Buy groceries for next week</td>
                  <td>In progress</td>
                  <td>Admin</td>
                </tr>

                  <th scope="row">3</th>
                  <td>
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <button type="submit" class="btn btn-success ms-1">Finished</button>
                    </td>
                  <td>Buy groceries for next week</td>
                  <td>In progress</td>
                  <td>Admin</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
</section>

@endsection