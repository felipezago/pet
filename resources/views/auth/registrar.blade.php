
@extends('layout.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Happy Pet!</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="deion">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ 'images/favicon.ico' }}">
    <link href=" {{ 'assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet' }}" type="text/css">
    <link href="{{ 'assets/libs/dripicons/webfont/webfont.css" rel="stylesheet' }}" type="text/css">
    <link href="{{ 'assets/libs/simple-line-icons/css/simple-line-icons.css' }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-account-pages">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-logo-box">
                                    <h2 class="text-uppercase text-center">
                                        <a href="/telalogin" class="text-success">
                                            <span>
                                                <img src="images/logo_dark.png" alt="" height="150">
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
                                <form class="form-horizontal "method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="name" class="font-weight-medium">Nome Completo</label> 
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Claiton Neri Didoné">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="email" class="font-weight-medium">Email</label> 
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="claiton@happypet.com">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password" class="font-weight-medium">Senha</label> 
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Digite sua Senha">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password-confirm" class="font-weight-medium">Confirme a Senha</label> 
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme a Senha">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <button style="background: #84D6E9; border: #84D6E9;" href= "/telalogin" class="btn btn-block btn-success waves-effect waves-light" type="submit">Registar</button></div>
                                        </div>
                                </form>
                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted">Já me registrei: <a href="/telalogin" class="text-dark ml-1"><b>Login</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>