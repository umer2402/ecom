<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drop Shipper Account</title>
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
                    <h2>Drop Shipper Account</h2>
                    <a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="my-account">
            <div class="row">
                <div class="col-md-12 text-center" style="margin-bottom: 30px;">
                    <h3>Start dropshipping with a dedicated website account</h3>
                    <p>Create a drop shipper profile for sourcing, product research, and marketplace access. Buyer accounts should use the regular customer login.</p>
                    <p><a href="{{ route('user.login') }}" class="btn btn-default">Buyer Login</a></p>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="login">
                        <h2>Drop Shipper Login</h2>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->dropshipperLogin->has('username') || $errors->dropshipperLogin->has('password'))
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach($errors->dropshipperLogin->get('username') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach($errors->dropshipperLogin->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('dropshipper.authenticate') }}" method="post">
                            @csrf
                            <p>
                                <label for="dropshipper-login-username">Username or email address <span class="required">*</span></label>
                                <input type="text" name="username" id="dropshipper-login-username" value="{{ old('username') }}">
                            </p>
                            <p>
                                <label for="dropshipper-login-password">Password <span class="required">*</span></label>
                                <input type="password" name="password" id="dropshipper-login-password">
                            </p>
                            <p class="form-row">
                                <input type="submit" class="btn" name="login" value="Login as Drop Shipper">
                                <label for="dropshipper-rememberme" class="inline">
                                    <input class="checkbox" name="rememberme" type="checkbox" id="dropshipper-rememberme" value="forever"> Remember me
                                </label>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="register">
                        <h2>Create Drop Shipper Account</h2>

                        @if(
                            $errors->dropshipperRegister->has('username') ||
                            $errors->dropshipperRegister->has('email') ||
                            $errors->dropshipperRegister->has('password')
                        )
                            <div class="alert alert-danger">
                                <ul style="margin-bottom: 0;">
                                    @foreach($errors->dropshipperRegister->get('username') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach($errors->dropshipperRegister->get('email') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach($errors->dropshipperRegister->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('dropshipper.register') }}" method="post">
                            @csrf
                            <p>
                                <label for="dropshipper-register-username">Username *</label>
                                <input type="text" name="username" id="dropshipper-register-username" value="{{ old('username') }}">
                            </p>
                            <p>
                                <label for="dropshipper-register-email">Email address *</label>
                                <input type="email" name="email" id="dropshipper-register-email" value="{{ old('email') }}">
                            </p>
                            <p>
                                <label for="dropshipper-register-password">Password <span class="required">*</span></label>
                                <input type="password" name="password" id="dropshipper-register-password">
                            </p>
                            <p class="form-row">
                                <input type="submit" class="btn" name="register" value="Register as Drop Shipper">
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
