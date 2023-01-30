<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <a href="{{ route('lists') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-semi-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <button
                                class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    aria-label="Write">
                                    <path
                                        d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                                        stroke="currentColor"></path>
                                </svg>
                                <span class="px-1"><a
                                        href="{{ route('product.create') }}">{{ __('Write') }}</a></span>
                            </button>
                        </li>
                        <li>
                            <button
                                class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="px-1"><a href="#">{{ __('Profile') }}</a></span>
                            </button>
                        </li>
                        <li>
                            <button
                                class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span class="px-1"><a href="#">{{ __('My Post') }}</a></span>
                            </button>
                        </li>
                        <li>
                            <button
                                class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                <span class="px-1"><a href="{{ route('logout') }}">{{ __('Log Out') }}</a></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                            style="background-color: #e5a0c6; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                    style="width: 150px; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                    style="z-index: 1;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Edit profile
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5 class="text-capitalize">{{Auth::user()->name}}</h5>
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
                                <h4>Information</h4>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="text" class="form-control inp" id="email" placeholder=""
                                            name="email" value="{{ old('email', Auth::user()->email) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone" class="form-label">{{ __('Address') }}</label>
                                        <input type="number" class="form-control inp" id="phone" placeholder="Address"
                                            name="phone" value="{{ old('phone', Auth::user()->phone) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone" class="form-label">{{ __('Phone No') }}</label>
                                        <input type="number" class="form-control inp" id="phone" placeholder="123 456 789"
                                            name="phone" value="{{ old('phone', Auth::user()->phone) }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="passwordr" class="form-control inp" id="password" placeholder="123 456 789"
                                            name="password" value="{{ old('phone', Auth::user()->password) }}" />
                                    </div>
                                    <button class="btn btn-sm btn-success">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- Back to Top -->
    <a href="{{ route('lists') }}" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
