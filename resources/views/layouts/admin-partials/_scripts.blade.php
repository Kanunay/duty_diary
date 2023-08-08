    <!-- Bootstrap core JavaScript-->
    {{-- old --}}
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    {{-- public scripts --}}
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('sweetalert/package.json') }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.js') }}"></script>

    {{-- _modal --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- sweetalert --}}
    <script>
        function deleteUser(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                imageUrl: "{{ asset("you-sure-ba.png") }}",
                imageHeight: 300,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form for deletion
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('users.destroy', '') }}/' + userId;
                    form.style.display = 'none';
    
                    const csrfInput = document.createElement('input');
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    form.appendChild(csrfInput);
    
                    const methodInput = document.createElement('input');
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);
    
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
    
    <script>
        @if(session('success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
    