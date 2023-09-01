<!DOCTYPE html>
<html lang="en">

@include("layouts.admin-partials._head")

<body class="bg-gradient-primary">

    <div class="container">
        
        <div class="row mt-2">
            <div class="col-12 col-md-8 offset-2">
                <div class="alert alert-danger text-center">
                    <h1><strong>Restricted route:</strong>
                        Uh, uh, 
                        uh! Di ka pwede!
                    </h1>
                </div>
            </div>
            <div class="col-12 col-md-4 offset-4 mb-3">
                @auth
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-block btn-lg text-white" >Back</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning btn-block btn-sm">Login</a>
                @endauth
            </div>
            <div class="col-12 col-md-4 offset-4">
                <img src="{{ asset('/rat-dancing-rat.gif') }}" alt="Not Authorized" class="img-fluid">
            </div>
        </div>

    </div>

    @include("layouts.admin-partials._scripts")

</body>

</html>