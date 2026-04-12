<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    @include('csslinks')
</head>
<body>
<main id="panel" class="panel">
    <header id="header">
        @include('topbar')
        <div class="container-fluid">
            @include('navbar')
        </div>
    </header>

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
                    <h2>My Account</h2>
                    <a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="my-account">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="login">
                        <h2>Login</h2>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->has('username') || $errors->has('password'))
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach($errors->get('username') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach($errors->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <p>
                                <label for="login-username">Username or email address <span class="required">*</span></label>
                                <input type="text" name="username" id="login-username" value="{{ old('username') }}">
                            </p>
                            <p>
                                <label for="login-password">Password <span class="required">*</span></label>
                                <input type="password" name="password" id="login-password">
                            </p>
                            <p class="form-row">
                                <input type="submit" class="btn" name="login" value="Login">
                                <label for="rememberme" class="inline">
                                    <input class="checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me
                                </label>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="register">
                        <h2>Register</h2>

                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach($errors->get('email') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <p>
                                <label for="register-username">Username *</label>
                                <input type="text" name="username" id="register-username" value="{{ old('username') }}">
                            </p>
                            <p>
                                <label for="register-email">Email address *</label>
                                <input type="email" name="email" id="register-email" value="{{ old('email') }}">
                            </p>
                            <p>
                                <label for="register-password">Password <span class="required">*</span></label>
                                <input type="password" name="password" id="register-password">
                            </p>
                            <p class="form-row">
                                <input type="submit" class="btn" name="register" value="Register">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer')
@include('jslinks')
</body>
</html>
