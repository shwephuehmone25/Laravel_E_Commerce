<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
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
    <div class="w-100 d-flex justify-content-center align-items-center">
        <div class="container-wrapper">
            <div class="w-80 d-flex align-items-center justify-content-center py-2">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
                    class="d-flex col-md-8 flex-column border border-3 createForm border-secondary">
                    @csrf
                    <h2 class="">{{ __('Create Product') }}</h2>
                    <div class="d-flex flex-column mb-3">
                        <input type="text" id="name" name="name"
                            class="rounded form-control border border-1 px-3 py-2" placeholder="Product Name" />
                        @error('name')
                            <small class="text-danger mt-2">*{{ __($message) }}</small>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label for="category">{{ __('Select Category:') }}</label>
                        <select class="selectpicker" id="my-select" name="category[]" id="floatingSelect"
                            aria-label="Floating label select example" multiple data-live-search="true">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger  mt-2">*{{ __($message) }}</small>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <input type="file" id="img" name="image" class="rounded form-control"
                            placeholder="Image" />
                        <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ0AAAB2CAMAAADle2GlAAAAVFBMVEXy8vJmZmbz8/P29vZdXV1tbW3p6eliYmKDg4Pb29tMTEz9/f35+fne3t7S0tKOjo6dnZ3BwcFWVlawsLC2traXl5d8fHxycnLKysqpqalRUVGjo6Oq2y0/AAAEzklEQVR4nO2aYZuqLBCGlUHEl0EwFW39///zgJtlZUWk9J5z+XzYbZXg3plhBsQk2fVPinwb4Kl2unDtdOHa6cK104VrpwvXTheunS5cO124drpw7XTh2unCtdOF6w06grCO0HtQ/4bANF9HWsLadCDTw3+r6OeQSc9hvelQUc3WUUuVWJlO5CkDICsIWEpXp6MZW2eCE5ZR4dfVt+g8m/r2udPdN/Xt86+js/PvHarz12LQEcEKCfge2fjFCHQgeZqmpoK37ReBDvs0t3T5ofatmRHpCEtPOlSP8B5F5fZ0UNMTXW4WQ48AYbbyLfW/PR2qfDJeuphoRKmyTskl8gh0/DkdNgfbIKf9Al4EuvZMly30ATKfbt5HZYS466e4o+39SAQm09L23ngxMor6xcu7BcficWK3U/oOLwIdYYrmOaXZwh4ByktQpvcNYtQKInqt2mopriCb0VFzu9KMswqwez+yUMcItDM4i1ffNPrqCgr7Q3qlvLwOvW/SEZneKO+uR/kiHUGT3+LdpJUv0kFzuIVL059yPne+RwclvYezmqeVr9GR5N6vY+ip/wOdGJZNl9Lm8uApDh0BxOtcDP3PMpytaBffRqEDUtZNMc+0wLJHcGnOz9+Osush/EAPtJ3hTSuDZd8OE1GEfQUwM6JQde4CmydwtmUPseiAnVdw6mQ9kE/hLsvUzekgMWeUEx5J+GIymRnvVDK2piPMzOz069yHyWTWsMEIdNZMVyRuajwqEtcanxdvS3dfEKxzcam+3irnsDXdZULM8V7N2FO7I2xLR2Apq9mIx9rHena1siHdbcxdrAfCw3q5TSvb0ZHkUT2gbYL1azyqt6MjT4oVVQLrh6uAS7MeN6KDB26d8IjwsF4qN6JL2ueVVPs4N+fJJnQv4H6d27x0Lq27LeieLZAmPB/n5luck6UvqvyI1xKvmbsBnY+osmn55b/xLTqX914vCNY/Y+w8HOuUm+5lk25t20HlaTyP8Hx8ihBKl0CT5esoa1Z/a8FtdIp1xLwP19455VrjpYBR/iO+QRdfO124AukWHmZ/COI5jJeg1pgQOcyeDlTHgHPuFwqkwyEtCEh1mYNQumNu95m4Bf54cboZ9v7AJ3SDFpbOplXJTnh2wwDMrp/dBWBy3IVI5u4wGThOqGd1aUbbIVf86DqBvhZKaXNUOpNQmNb+BKUU77Hkgwl7WyScrj+KQmFzFEKVZIw7YSrBDomotL0keu0+oOnRMFHq999u+IgOu0QqVBKwqdHR1YJLwjoBpUZJRD8I3QMOFeMCGA+aMuF0Yqhs3FmXQa8nugJYh44OZZ0N9m+7Uq5kp7XqItOB5It0o+0q05eDUHZe11WhEsbCBvqADnWjkDOCY6a7pjPShppoSwLHSnLEpH/7tZUP6NDSgUxbPFZCtG7oa7oORDUIN2VMRQxDyWPSOdslRLXATNOMzz7dnB1nhYs7oXXFDbM3j1klGtXzMqZniUu5hEmbdqvf8237B0j7uwD3KbFXSyZYUxwrgLIpgkwXXLzPFYrAKZONBWzs0F12L7BC32JiCpJAULL7gM6v84Fz3w3OcgeroSx1DsnSmwNvdLAayoP+Pxrgn1wbR9JOF66dLlw7Xbh2unDtdOEi6z0z3EJ/AIrCSHJt4zKDAAAAAElFTkSuQmCC"
                                style="height: 80px; width: 80px" name="image" id="preview-image" accept="image/*" />
                        </div>
                        @error('image')
                            <small class="text-danger mt-2">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summerNote" class="summernote" name="description"></textarea>
                        @error('description')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mb-3 mt-2">
                        <input type="text" id="price" name="price"
                            class="rounded form-control border border-1 px-3 py-2" placeholder="Price" />
                        @error('price')
                            <small class="text-danger  mt-2">*{{ __($message) }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-2">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summerNote").summernote({
                placeholder: "{{ __('Product Description') }}",
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"
        integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>
