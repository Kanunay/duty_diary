        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-solid fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Diary <sup>v0.1</sup></div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('diaries.index') }}">
                    <i class="fas fa-solid fa-book-open"></i>
                    <span>Diaries</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('documentations.index') }}">
                    <i class="fas fa-solid fa-camera-retro"></i>
                    <span>Documentation</span></a>
            </li>

            @if ( Auth::user()->role_id == 1)

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('approval_request.index') }}">
                        <i class="fa fa-solid fa-check-double"></i>
                        <span>Approval Request</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fa fa-solid fa-users"></i>
                        <span>Users</span></a>
                </li>
                
            @elseif ( Auth::user()->role_id == 2)

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('approval_request.index') }}">
                        <i class="fa fa-solid fa-check-double"></i>
                        <span>Approval Request</span></a>
                </li>

            @else
                {{-- Oi what are ya inspecting here for? --}}
            @endif

        </ul>
        <!-- End of Sidebar -->