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
                    <div class="row mb-3">
                        <div class="col-6">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('categories.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="cat_file" class="form-control mb-1">
                                <button class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-success" id="import-btn">
                                    <i class="fa-solid fa-file-import text-white-50"></i>
                                    Import Category
                                </button>
                            </form>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('categories.export') }}"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>Generate Category</a>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="bg-mute text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th style="width: 30%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $c->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm editBtn">
                                                {{-- <a href="{{route('catego.update',$user->id)}}"> --}}
                                                <i class="fa-solid fa-pen text-white"></i>
                                                Edit
                                                </a>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
