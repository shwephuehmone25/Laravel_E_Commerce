@extends('layouts.adminlayout')

@section('dashboard')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topnav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Create User</h5>
                                <form  method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName" name="name">
                                        @error('name')
                                            <small class="text-danger mt-2">*{{ __($message) }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" name="email">
                                        @error('email')
                                            <small class="text-danger mt-2">*{{ __($message) }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword" name="password">
                                        @error('password')
                                            <small class="text-danger mt-2">*{{ __($message) }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; E-Shopper 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@endsection
