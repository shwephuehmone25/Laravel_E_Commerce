<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="row">
                <div class="col-lg-4">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark" href="">FAQs</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Help</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Support</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-inline-flex align-items-center">
                    @include('partials.lang')
                    </div>
                </div>
            </div>  
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                            <i class="fas fa-pen text-primary"></i>
                            <span class="px-1"><a href="{{ route('product.create') }}">{{ __('Write') }}</a></span>
                        </button>
                    </li>
                    <li>
                        <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                            <i class="fas fa-user text-primary"></i>
                            <span class="px-1"><a href="{{route('profile',Auth::user()->id)}}">{{ __('Profile') }}</a></span>
                        </button>
                    </li>
                    <li>
                        <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                            <i class="fas fa-file text-primary"></i>
                            <span class="px-1"><a href="{{route('mypost.show',Auth::user()->id)}}">{{ __('My Post') }}</a></span>
                        </button>
                    </li>
                    <li>
                        <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="px-1"><a href="#">{{ __('Favorite') }}</a></span>
                        </button>
                    </li>
                    <li>
                        <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                            <i class="fa-solid fa-right-from-bracket text-primary"></i>
                            <span class="px-1"><a href="{{ route('logout') }}">{{ __('Log Out') }}</a></span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{ route('lists') }}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products" name="search">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="{{ route('cart.list') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<!-- Topbar End -->
@auth

@endauth
