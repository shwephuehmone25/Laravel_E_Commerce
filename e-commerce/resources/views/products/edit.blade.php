<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Product</title>
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
    <div class="horizontal"></div>
    <div class="w-100 d-flex justify-content-center align-items-centerr">
        <div class="container-wrapper">
            <div class="w-80 d-flex align-items-center justify-content-center py-2">
                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
                    class="d-flex col-md-8 flex-column border border-3 editForm border-secondary">
                    @csrf
                    <h2 class="mb-3">{{__('Edit Product')}}</h2>
                    <div class="d-flex flex-column mb-3">
                        <input type="text" id="name" name="name"
                            class="rounded form-control border border-1 px-3 py-2 "
                            value="{{ old('name', $product->name) }}" />
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex flex-column mb-3">
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
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <input type="file" id="img" name="image" class="rounded form-control"
                            placeholder="Image" />
                        <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                            <img src="{{ asset('storage/images/' . $product->image) }}" style="height: 80px; width: 80px"
                                name="image" id="preview-image" />
                        </div>
                        @error('image')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summerNote" class="summernote" name="description">{{ $product->description }}</textarea>
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
                        {{__('Publish')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summerNote").summernote({
                placeholder: "Post Description",
                height: 100,
                tabsize: 2,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                ],
            });
        });
        $(document).ready(function(e) {
            $('#img').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
        });

        $(document).ready(function() {
            $('#my-select').selectpicker();
        });
    </script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"
        integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>
