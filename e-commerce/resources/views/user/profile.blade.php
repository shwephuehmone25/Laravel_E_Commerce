<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <!-- Topbar Start -->
    @include('layouts.navigation')
    <!-- Topbar End -->
    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            {{ Breadcrumbs::render('profile', $user) }}
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                            style="background-color: #e5a0c6; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="{{ asset('storage/images/' . $user->image) }}" alt="Generic placeholder image"
                                    class="img-fluid img-thumbnail mt-4 mb-2" style="width: 100px; z-index: 1"
                                    onerror="this.onerror=null;this.src='{{ asset('img/avatar.jpg') }}';">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                    style="z-index: 1;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Edit profile
                                </button>

                                <!--Profile Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">
                                                    Profile Information</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="col-8">
                                                        <form method="POST"
                                                            action="{{ route('user.update', Auth::user()->id) }}"
                                                            enctype="multipart/form-data" id="editForm">
                                                            @csrf
                                                            <input type="file" id="profile" name="image"
                                                                class="rounded form-control" placeholder="Image"
                                                                hidden />
                                                            <img src="{{ asset('storage/images/' . Auth::user()->image) }}"
                                                                alt="Photo" width="70" height="70"
                                                                class="rounded-circle" id="preview-image"
                                                                name="image"
                                                                onerror="this.onerror=null;this.src='{{ asset('img/avatar.jpg') }}';" />
                                                            @error('image')
                                                                <small
                                                                    class="error-message text-danger">*{{ $message }}</small>
                                                            @enderror
                                                            <button type="button"
                                                                class="btn text-success rounded-pill" id="update-btn">
                                                                <i class="fa-solid fa-pen-to-square"></i>

                                                            </button>
                                                            <button class="btn text-danger rounded-pill">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                            <div class="mb-3 mt-3">
                                                                <label for="name"
                                                                    class="form-label">{{ __('Name') }}*</label>
                                                                <input type="text" class="form-control inp"
                                                                    id="name" name="name" placeholder=""
                                                                    value="{{ old('name', Auth::user()->name) }}" />
                                                                @error('name')
                                                                    <small class="error-message text-danger"
                                                                        id="error-message">*{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address"
                                                                    class="form-label">{{ __('Address') }}</label>
                                                                <input type="text" class="form-control inp"
                                                                    id="address" placeholder="" name="address"
                                                                    value="" />
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="saveBtn btn btn-outline-primary rounded-pill text-primary"
                                                    id="saveBtn">
                                                    {{ __('Save') }}
                                                </button>
                                                <button type="reset"
                                                    class="resetBtn btn btn-outline-primary text-dark rounded-pill"
                                                    onclick="resetForm()" data-bs-dismiss="modal">
                                                    {{ __('Cancel') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5 class="text-capitalize">{{ Auth::user()->name }}</h5>
                                <p>New York</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">253</p>
                                    <p class="small text-muted mb-0">Photos</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">1026</p>
                                    <p class="small text-muted mb-0">Followers</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">478</p>
                                    <p class="small text-muted mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h3>Information</h3>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="text" class="form-control inp" id="email" placeholder=""
                                            name="email" value="{{ old('email', Auth::user()->email) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone" class="form-label">{{ __('Address') }}</label>
                                        <input type="number" class="form-control inp" id="phone"
                                            placeholder="Address" name="phone"
                                            value="{{ old('address', Auth::user()->address) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone" class="form-label">{{ __('Phone No') }}</label>
                                        <input type="number" class="form-control inp" id="phone"
                                            placeholder="123 456 789" name="phone"
                                            value="{{ old('phone', Auth::user()->phone) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="passwordr" class="form-control inp" id="password"
                                            placeholder="password" name="password"
                                            value="{{ old('password', Auth::user()->password) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script type="text/javascript">

        $(document).ready(function() {

            $("#update-btn").click(function() {
                $("#profile").click();
            });
        });
        $(document).ready(function(e) {
            $('#profile').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
        });
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
