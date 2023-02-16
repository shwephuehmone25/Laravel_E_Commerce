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
                        <a href="{{route('users.export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="bg-mute text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Author</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th style="width: 30%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->user->name}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{!!$p->description!!}</td>
                                    <td>{{$p->price}}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/' . $p->image) }}"
                                        alt="Product" width="30%" height="30%">    
                                    </td>
                                    <td>
                                        <form action="{{route('product.remove',$p->id)}}" method="Post"
                                            onsubmit="return confirm('{{ trans('Are You Sure ? ') }}');">
                                        <button class="btn btn-success btn-sm editBtn">
                                            <a href="{{route('update.product',$p->id)}}">
                                            <i class="fa-solid fa-pen text-white"></i>
                                            Edit
                                        </a>
                                        </button>
                                         @csrf
                                            @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>     
                          <div class="d-flex">
                            {!! $products->links() !!}
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
   
