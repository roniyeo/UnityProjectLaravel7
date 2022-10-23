<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>
    <link rel="stylesheet" href="{{ asset('backend/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/img/unity.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend/img/unity.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="{{ asset('backend/images/bg/logo_unity.png') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Portal Admin</h1>
                    @if (session('message'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="text" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="username" autofocus required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Sign In</button>
                    </form>
                    <div class="text-center mt-3 text-lg fs-4">
                        <p class="text-gray-600">
                            <a href="/" class="font-bold">Back to Site</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
</body>

</html>
