<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/layouts/site/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/site/footer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/profile/index.css') }}" rel="stylesheet">

        <title>Masterer</title>
    </head>
    <body>
        <div class="header">
            <div class="header-side">
                <div class="header-buttons">
                    <a href="{{ route('homePage') }}"
                     rel="alternate">
                        <img src="{{ asset('images/icons/back-icon.png') }}" alt="Contato" width="25px" height="25px">
                    </a>
                    <a href="" target="_blank" rel="alternate">
                        <img src="{{ asset('images/icons/sale-icon.png') }}" alt="Carrinho" width="25px" height="25px">
                    </a>
                </div>
                <div class="header-center">
                    <a href="" target="_self" rel="alternate">
                        <img src="{{ asset('images/icons/masterer-icon.png') }}" alt="Masterer" >
                    </a>
                </div>
                <div class="header-search">
                    <input type="text" id="search-product" name="search-product">
                </div>
            </div>
        </div>

        @php
            $loggedUser = App\Repositories\UserRepository::findById(Request::route('id'));
        @endphp

        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="content">
            <div class="form-content">
            <form method="POST" action="{{ route('deleteUser', $loggedUser->id) }}">
                @csrf
                <div class="form-inputs">
                    <img src="{{ asset('images/icons/user-icon.png') }}" alt="User" width="100px" height="100px" style="border-radius: 50%; align-self: center;">
                    <h2 style="align-self: center;">Excluir Perfil</h2>
                    <p>Preencha os dados para efetuar a exclusão.</p>
                    <input id="name" type="text" class="input-texto @error('name') is-invalid @enderror" name="name" value="<?=$loggedUser->name ?>" required autocomplete="name" placeholder="Nome" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="email" type="email" class="input-texto @error('email') is-invalid @enderror" name="email" value="<?=$loggedUser->email ?>" required placeholder="E-mail" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="input-texto @error('password') is-invalid @enderror" name="password" required placeholder="Senha" autocomplete="old-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary delete-button">
                        {{ __('Excluir perfil') }}
                    </button>
                </div>
            </form>
        </div>
        </div>

        <div class="footer">
            <div class="footer-social">
                <a href="" target="_self" rel="alternate">
                    <img src="{{ asset('images/icons/masterer-icon.png') }}" alt="Masterer" >
                </a>
                <div class="footer-social-links">
                    <a href="" target="_blank" rel="alternate">
                        <img src="{{ asset('images/icons/insta-icon.png') }}" alt="Instagram" width="30px" height="30px">
                    </a>
                    <a href="" target="_blank" rel="alternate">
                        <img src="{{ asset('images/icons/face-icon.png') }}" alt="Facebook" width="30px" height="30px">
                    </a>
                    <a href="" target="_blank" rel="alternate">
                        <img src="{{ asset('images/icons/tweeter-icon.png') }}" alt="Tweeter" width="30px" height="30px">
                    </a>
                </div>
            </div>

            <div class="footer-info">
                <div class="footer-info-contato">
                    <h3>Contato</h3>
                    <a href="http://" id="atendimento" target="_blank" rel="alternate">Atendimento</a>
                    <a href="http://" id="fale_conosco" target="_blank" rel="alternate">Fale Conosco</a>
                    <a href="http://" id="duvidas" target="_blank" rel="alternate">Dúvidas</a>
                </div>
                <div class="footer-info-duvidas">
                    <h3>Dúvidas</h3>
                    <a href="http://" id="politica_privacidade" target="_blank" rel="alternate">Política de Privacidade</a>
                    <a href="http://" id="politica_trocas" target="_blank" rel="alternate">Política de Trocas</a>
                    <a href="http://" id="pagamento" target="_blank" rel="alternate">Pagamento e Envio</a>
                </div>
                <div class="footer-info-newsletter">
                    <h3>Receba novidades</h3>
                    <label for="newsletter-input">Assine e receba todas as novidades em primeira mão:</label>
                    <input type="text" id="newsletter-input" name="newsletter-input">
                </div>

            </div>
        </div>
    </body>
</html>
