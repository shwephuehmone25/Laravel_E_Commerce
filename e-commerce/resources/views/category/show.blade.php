<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search by Category</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css"
        integrity="sha256-IKhQVXDfwbVELwiR0ke6dX+pJt0RSmWky3WB2pNx9Hg=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
  @include('layouts.navigation')
  <div class="container">
    <div class="row">
        <div class="col-8">
            @if (request('search'))
                <h5 class="searchPost mb-3">
                    Search Results for {{ request('search') }}...
                </h5>
            @endif
            @if (request('id', 'category_id'))
                    <h2 class="mt-3">
                        <svg width="21" height="21" class="ux">
                            <path
                                d="M4.66 8.72L3.43 9.95a1.75 1.75 0 0 0 0 2.48l5.14 5.13c.7.7 1.8.69 2.48 0l1.23-1.22 5.35-5.35a2 2 0 0 0 .51-1.36l-.32-4.29a2.42 2.42 0 0 0-2.15-2.14l-4.3-.33c-.43-.03-1.05.2-1.36.51l-.79.8-2.27 2.28-2.28 2.27zm9.83-.98a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5z"
                                fill-rule="evenodd"></path>
                        </svg>
                        {{ $products[0]?->categories[0]?->name }}
                    </h2>
                    <hr/>
                @endif
            @forelse ($products as $p)
                <div class="row mt-5">
                    <div class="col-8">
                        <div class="d-flex justify-content-start">
                            <div class="px-2" style="width: 100%" id="pf-img">
                                    <p class="mb-2 pst-wrt">
                                        <img src="{{ asset('storage/images/' . $p->user->image) }}"
                                            alt="default" width="24px" name="image" height="24px"
                                            class="rounded-circle"
                                            onerror="this.onerror=null;this.src='{{ asset('img/avatar.jpg') }}';" />
                                        {{ $p->user->name }}
                                        <span class="text-muted pst-date">.
                                            {{ $p->created_at->toFormattedDateString() }}</span>
                                    </p>
                                </a>
                                    <h6 class="list-ttl">
                                        {{ $p->title }}
                                    </h6>
                                    <p class="list-txt">
                                        {!! $p->description !!}
                                    </p>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4">
                                                @foreach ($p->categories as $c)
                                                    <a href="{{ route('category.show', $c->id) }}">
                                                        <button
                                                            class="btn bg-primary btn-sm text-dark rounded-pill mt-1"
                                                            id="catBtn" onclick="categoryBtn"
                                                            data-toggle="collapse" class="">
                                                            {{ $c->name }}
                                                        </button>
                                                    </a>
                                                @endforeach
                                            </div>

                                            <div class="col-4">
                                                <p class="blog-date">{{ $p->created_at->diffForHumans() }} </p>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('product.show', $p->id) }}" class="btn btn-sm text-dark p-0">
                                                    <i class="fas fa-eye text-primary mr-1"></i>{{ __('View Detail') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('storage/images/' . $p->image) }}" height="112" width="112"
                            enctype="multipart/form-data" onerror="this.onerror=null;this.src='{{ asset('img/default.jpg') }}';"  />
                    </div>
                </div>
                <hr />
            @empty
                <h5 class="text-danger text-center mt-5">No Posts Here!!!</h5>
                <img src="{{ asset('img/no-data.png') }}" height="50%" width="80%"
                    class="align-item-center mt-3" style="margin-left: 200px;"/>
            @endforelse
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"
        integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>
