<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/layouts/login/index.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <title>Masterer</title>
</head>
<body>
    <div class="content">
        <div class="image-content"></div>
        <div class="form-content">
            <form method="POST" action="{{ route('login') }}">
                <div class="form-inputs">
                    <h1>Fazer Login</h1>
                        @csrf
                        <input id="email" type="email" class="input-texto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="input-texto @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar de mim') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('password.request') }}" target="_blank" rel="alternate">Esqueci minha senha</a>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary form-button">
                        {{ __('Entrar') }}
                    </button>
                </div>
            </form>
            <p>Não tem conta?</p>
            <a href="{{ route('register') }}" class="cadastrar-link" rel="alternate">Cadastre-se</a>
        </div>
    </div>
</body>
</html>
