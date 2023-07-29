<!doctype html>
{{-- head --}}
@include("layouts.admin-partials._head")

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include("layouts.admin-partials._side_bar")


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include("layouts.admin-partials._topbar")


                {{-- place here the content "HOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOD RIIIIIIIIIIIIIIIDER" --}}
                @yield("content")



            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            @include("layouts.admin-partials._footer")


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    @include("layouts.admin-partials._scroll-to-top")
    

    {{-- scripts --}}
    @include("layouts.admin-partials._scripts")

</body>
