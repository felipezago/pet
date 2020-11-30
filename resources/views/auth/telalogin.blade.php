@extends('layout.app')

@section('content')

<!DOCTYPE html> 
<html lang="en">
<!-- Mirrored by: HTTrack Website Copier/3.x. Site: coderthemes.com. File: /greeva/vertical/boxed/auth-login.html. Date: Wed, 26 Sep 2018 18:04:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HappyPet</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="deion">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ 'images/favicon.ico' }}">
    <!-- Icons css -->
    <link href="{{ 'assets/libs/%40mdi/font/css/materialdesignicons.min.css' }}" rel="stylesheet" type="text/css">
    <link href="{{ 'assets/libs/dripicons/webfont/webfont.css" rel="stylesheet' }}" type="text/css">
    <link href="{{ 'assets/libs/simple-line-icons/css/simple-line-icons.css'}}" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-account-pages">
    <!-- Login -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="account-box">
                                <!-- Logo box-->
                                <div class="account-logo-box">
                                    <h2 class="text-uppercase text-center"><a href="index.html" class="text-success"><span><img src="images/logo_dark.png" alt=""
                                                    height="150"></span></a></h2>
                                </div>
                                <div class="account-content">
                                    <form method="POST" action="{{ route('login') }}" >
                                            @csrf

                                        <div class="form-group mb-3">
                                            <label for="emailaddress" class="font-weight-medium">{{ __('E-Mail') }}</label> 
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mb-3">

                                            <label for="password" class="font-weight-medium">{{ __('Senha') }}</label> 
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="checkbox checkbox-info"><input id="remember" type="checkbox">
                                                <label class="form-check-label" for="remember">Conectar automaticamente!</label></div>
                                        </div>
                                        <div class="form-group row text-center">
                                            <div class="col-12">
                                                <button style="background: #84D6E9; border: #84D6E9;" class="btn btn-block btn-success waves-effect waves-light" type="submit">Entrar</button></div>
                                        </div>
                                    
                                    </form>
                                    <!-- end form -->
                                    <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Crie sua conta: <a href="registrar" class="text-dark ml-1"><b>Registre-se!</b></a></p>
                                            </div>
                                        </div>
                                    <!-- end row-->
                                </div>
                                <!-- end account-content -->
                            </div>
                            <!-- end account-box -->
                        </div>
                        <!-- end account-page-->
                    </div>
                    <!-- end wrapper-page -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- END HOME -->
    <!-- jQuery  -->
</body>
<!-- Mirrored by: HTTrack Website Copier/3.x. Site: coderthemes.com. File: /greeva/vertical/boxed/auth-login.html. Date: Wed, 26 Sep 2018 18:04:12 GMT -->

</html>