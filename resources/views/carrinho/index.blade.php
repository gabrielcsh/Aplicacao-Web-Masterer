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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="{{ asset('css/layouts/site/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/site/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/site/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/cart/index.css')  }}" >

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
    <div class="content">
        <div class="container">
            <div class="row d-flex align-items-center">
                <h3>Produtos no Carrinho</h3>
            </div>
            <div class="row d-flex align-items-center">
                @forelse ($pedidos as $order)
                    <h5 class="col 16 s12 m6"> Pedido: {{ $order->id }} </h5>
                    <h5 class="col 16 s12 m6"> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
            </div>
            <div class="row">
                <table>
                    <thead class="align-items-center justify-content-around">
                    <tr>
                        <th></th>
                        <th width="240" class="d-flex justify-content-center">Qtd</th>
                        <th width="240">Produto</th>
                        <th width="180">Valor Unit</th>
                        <th width="180">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total_pedido = 0;
                        @endphp
                    @foreach ($order->pedido_compra as $pedido_compra)
                        <tr class="mt-3">
                            <td>
                                <img width="100" height="100" src="{{ URL::asset("/images-products/{$pedido_compra->produto->image}") }}">
                            </td>
                            <td class="d-flex justify-content-center align-items-center mt-4">
                                <div class="center-align">
                                    <a class="col 14 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $order->id }}, {{ $pedido_compra->produto_id }}, 1 )">
                                        <i class="material-icons small">remove_circle</i>
                                    </a>
                                    <span class="col 14 m4 s4">{{$pedido_compra->Qtd}} </span>
                                    <a class="col 14 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_compra->produto_id }})">
                                        <i class="material-icons small">add_circle</i>
                                    </a>
                                </div>
                            </td>
                            <td> {{ $pedido_compra->produto->name }} </td>
                            <td>R$ {{ number_format($pedido_compra->produto->preco, 2, ',', '.') }} </td>
                            @php
                                $total_pedido += $pedido_compra->Qtd * $pedido_compra->produto->preco;
                                @endphp
                            <td>R$ {{ number_format($pedido_compra->Qtd * $pedido_compra->produto->preco, 2, ',', '.') }}
                            <td>
                                <!--action=" { { route('carrinho.remove', $order->id) }} -->
                                <a href="#" onclick="carrinhoRemoverProduto({{ $order->id }}, {{ $pedido_compra->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">
                                    <img src="{{ asset('images/icons/trash-icon.png') }}" alt="Delete product" width="20px" height="20px" style="margin-right: 8px;">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mt-3">
                <strong class="col offset-16 offset-m6 offset-s6 14 m4 s4 right-align">Total do Pedido: </strong>
                <span class="col 12 m2 s2"> R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>
            <div class="row d-flex justify-content-end">
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $pedido_compra->id }}">
                    <a class="btn btn-outline-dark tooltipped col 12 s4 m4 offset-18 offset-s8 offset-m8" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('homePage') }}">Continuar comprando</a>
                    <button type="submit" class="btn btn-outline-dark tooltipped col 14 s4 m4 offset-18 offset-s8 offset-m8" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>
                </form>
            </div>
            @empty
                <h5> Não há nenhum produto no Carrinho
            @endforelse
    </div>
        <form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="order_id">
            <input type="hidden" name="product_id">
            <input type="hidden" name="item">
        </form>
        <form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id">
        </form>
    </div>
    </div>
    <div class="footer mt-3">
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

@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush
