@extends('layouts.admin')

@section("content")
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
        <h1><strong>New User</strong></h1>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Role</label>
                <select id="inputState" class="form-control" name="role_id" id="role" required>
                    <option selected disabled>Choose...</option>
                    <option value="1">Admin</option>
                    <option value="2">Supervisor</option>
                    <option value="3">Trainee</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" required name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn">Cancel</a>
    </form>
</div>
@endsection
