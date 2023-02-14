<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="inner">
            <div class="image-holder">
                <img src="img/registration-form-4.jpg" alt="">
            </div>
            <h3>{{ __('Admin Register') }}</h3>
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf

                <div class="form-holder active">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus
                        placeholder="Enter your name" >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                </div>

                <div class="form-holder">
                    
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email"
                        placeholder="example@gmail.com" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-holder">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                        placeholder="{{__('Password')}}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-holder"> 
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                        placeholder="{{__('Confirm Password')}}">
                </div>
                    <div class="form-login">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $('.form-holder').delegate("input", "focus", function() {
                $('.form-holder').removeClass("active");
                $(this).parent().addClass("active");
            })
        })
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
</body>

</html>
