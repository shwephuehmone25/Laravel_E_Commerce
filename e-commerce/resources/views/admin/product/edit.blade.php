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
                                {{-- <h5 class="card-title">Edit</h5> --}}
                                <form method="POST" action="{{ route('update.product', $product->id) }}"
                                    enctype="multipart/form-data"
                                    class="d-flex col-md-8 flex-column  editForm border-secondary">
                                    @csrf
                                    <h2 class="mb-3">{{ __('Edit Product') }}</h2>
                                    <div class="d-flex flex-column mb-3">
                                        <input type="text" id="name" name="name"
                                            class="rounded form-control border border-1 px-3 py-2 "
                                            value="{{ old('name', $product->name) }}" />
                                        @error('name')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- <div class="d-flex flex-column mb-3">
                                        <label for="category">{{__('Select Category:')}}</label>
                                        <select class="selectpicker" id="my-select" name="category[]" id="floatingSelect"
                                            aria-label="Floating label select example" multiple data-live-search="true">
                
                                            @foreach ($product->categories as $category)
                                                {{ $cId[] = $category->pivot->category_id }}
                                            @endforeach
                
                                            @foreach ($categories as $cname)
                                                <option value="{{ $cname['id'] }}" @if (in_array($cname->id, $cId)) selected @endif>
                                                    {{ $cname['name'] }}
                                                </option>
                                            @endforeach
                
                                        </select>
                                        @error('category')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    <div class="d-flex flex-column mb-3">
                                        <input type="file" id="img" name="image" class="rounded form-control"
                                            placeholder="Image" />
                                        <div class="preview my-2 border-1 rounded-3 overflow-hidden"
                                            style="max-width: 150px">
                                            <img src="{{ asset('storage/images/' . $product->image) }}"
                                                style="height: 80px; width: 80px" name="image" id="preview-image" />
                                        </div>
                                        @error('image')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Description" id="floatingTextarea2Disabled" name="description" style="height: 100px" disabled>{{ $product->description }}</textarea>
                                        <label for="floatingTextarea2Disabled">Description</label>
                                      </div>
                                    @error('description')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror

                                    <div class="d-flex flex-column mb-3">
                                        <input type="text" id="price" name="price"
                                            class="rounded form-control border border-1 px-3 py-2 "
                                            value="{{ old('price', $product->price) }}" />
                                        @error('price')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="w-auto border-0 fit-content px-3 py-2 mt-2 bg-secondary text-dark rounded">
                                        {{ __('Publish') }}
                                    </button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
     $(document).ready(function(e) {
            $('#img').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
        });

</script>
