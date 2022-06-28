<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/layouts/site/index.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/site/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/site/footer.css') }}" rel="stylesheet">

        <title>Masterer</title>
    </head>
    <body>
        <div class="header">
            <div class="header-side">
                <div class="header-buttons">
                    @if (Auth::user() && Auth::user()->is_admin)
                        <div class="dropdown show">
                            <a id="dropdownMenuLinkAdmin" class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('images/icons/edit-icon.png') }}" alt="Funções Administrativas" width="25px" height="25px">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="{{ route('getCategories') }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ __('Listar categorias') }}</a>
                                <a href="{{ route('insertCategories') }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ __('Inserir categorias') }}</a>
                                <a href="{{ route('product.index') }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ __('Listar produtos') }}</a>
                                <a href="{{ route('product.create') }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ __('Inserir produtos') }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="dropdown show">
                        <a id="dropdownMenuLink" class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/icons/person-icon.png') }}" alt="Usuario" width="25px" height="25px">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if (Auth::user())
                                <a href="{{ route('profile', auth()->user()->id) }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ Auth::user()->name }}</a>
                                <a href="{{ route('deleteProfile', auth()->user()->id) }}" class="dropdown-item" aria-labelledby="navbarDropdown">{{ __('Excluir conta')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                            @if (!Auth::user())
                                <a href="{{ route('login') }}" class="dropdown-item">Log in</a>
                                <div class="dropdown-divider"></div>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="dropdown-item" aria-labelledby="navbarDropdown">Register</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('carrinho.index') }}" rel="alternate">
                        <img src="{{ asset('images/icons/sale-icon.png') }}" alt="Carrinho" width="25px" height="25px">
                    </a>
                </div>
                <div class="header-center">
                    <a href="{{route('homePage')}}" target="_self" rel="alternate">
                        <img src="{{ asset('images/icons/masterer-icon.png') }}" alt="Masterer" >
                    </a>
                </div>
                <form action="{{ route('homePage') }}" class="custom-form js-form-prevent-resend">
                    <div class="header-search form-inline my-2 my-lg-0 h-25">
                        <input class="form-control mr-sm-2 h-25" type="search" name="search-product" placeholder="Busque pelo nome de um produto...." aria-label="Search">
                        <button class="btn red btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </div>
                </form>
            </div>

            @php
                $categories = App\Repositories\CategoryRepository::index();
            @endphp

            <div class="header-categories">
                @foreach($categories as $category)
                    <form action="" method="get">
                        <button id="{{ $category->id }}" type="submit">{{ $category->name }}</button>
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                    </form>
                @endforeach
            </div>
        </div>

        @php
            $itens = [];
            if (isset($_GET['category_id'])) {
                $indice = 0;
                $produtos = $resources;
                foreach ($produtos as $produto){
                    if($produto->categorie_id == $_GET['category_id']){
                        $itens[$indice] = $produto;
                        $indice++;
                    }
                }
            }
        @endphp

        <div class="content">
            <div class="container">
                    <div class="row row-cols-1 row-cols-md-3">
                        @if (count($itens))
                            @foreach($itens as $product)
                                <div class="col mb-4">
                                    <a style="text-decoration: none;" href="{{ route('home.produto', $product->id) }}"> 
                                        <div class="card" style="width: 18rem;">
                                                <img class='card-img-top img-product-index' src='{{URL::asset("/images-products/{$product->image}")}}' height="200" width="200"  alt='Example.jpeg'>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <p class="card-text">R$ {{$product->formatPrice()}}</p>
                                                <form method="POST" action="{{ route('carrinho.adicionar') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button class="btn-large red darken-4 col l12 m12 s12 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        @else
                            @foreach($resources as $product)
                                <div class="col mb-4">
                                    <div class="card" style="width: 18rem;">
                                        <a style="text-decoration: none; color:black;" href="{{ route('home.produto', $product->id) }}">
                                            <img class='card-img-top img-product-index' src='{{URL::asset("/images-products/{$product->image}")}}' height="200" width="200"  alt='Example.jpeg'>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <p class="card-text">R$ {{$product->formatPrice()}}</p>
                                                
                                            </div>
                                        </a>
                                        <form method="POST" action="{{ route('carrinho.adicionar') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button class="btn-large col l12 m12 s12 red darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-social">
                <a href="{{route('homePage')}}" target="_self" rel="alternate">
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
                    <h5>Contato</h5>
                    <a href="http://" id="atendimento" target="_blank" rel="alternate">Atendimento</a>
                    <a href="http://" id="fale_conosco" target="_blank" rel="alternate">Fale Conosco</a>
                    <a href="http://" id="duvidas" target="_blank" rel="alternate">Dúvidas</a>
                </div>
                <div class="footer-info-duvidas">
                    <h5>Dúvidas</h5>
                    <a href="http://" id="politica_privacidade" target="_blank" rel="alternate">Política de Privacidade</a>
                    <a href="http://" id="politica_trocas" target="_blank" rel="alternate">Política de Trocas</a>
                    <a href="http://" id="pagamento" target="_blank" rel="alternate">Pagamento e Envio</a>
                </div>
                <div class="footer-info-newsletter">
                    <h5>Receba novidades</h5>
                    <label for="newsletter-input">Assine e receba todas as novidades em primeira mão:</label>
                    <input type="text" id="newsletter-input" name="newsletter-input">
                </div>

            </div>
        </div>
    </body>
</html>
