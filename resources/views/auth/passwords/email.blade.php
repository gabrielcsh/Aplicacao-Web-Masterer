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
            <form method="POST" action="{{ route('reset') }}">
                <div class="form-inputs">
                    <h1>Esqueci a senha</h1>
                        @csrf
                        <input id="email" type="email" class="input-texto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <button type="submit" class="btn btn-primary form-button">
                        {{ __('Enviar e-mail de recuperação') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

