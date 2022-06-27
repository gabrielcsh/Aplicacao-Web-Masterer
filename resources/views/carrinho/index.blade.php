@extends('layouts.app')

@section('content')

<div class=container>
    <div class="row">
        <h3>Produtos no Carrinho</h3>
        <hr/>
        @forelse ($pedidos as $order)
            <h5 class="col 16 s12 m6"> Pedido: {{ $order->id }} </h5>
            <h5 class="col 16 s12 m6"> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_pedido = 0;   
                    @endphp
                    @foreach ($order->pedido_compra as $pedido_compra)
                        <tr>
                            <td>
                                <img width="100" height="100" src="{{ URL::asset("/images-products/{$pedido_compra->produto->image}") }}">
                            </td>
                            <td class="center-align">
                                <div class="center-align">
                                    <a class="col 14 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $order->id }}, {{ $pedido_compra->produto_id }}, 1 )">
                                        <i class="material-icons small">remove_circle</i>
                                    </a>
                                    <span class="col 14 m4 s4">{{$pedido_compra->Qtd}} </span>
                                    <a class="col 14 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_compra->produto_id }})">
                                        <i class="material-icons small">add_circle</i>
                                    </a>
                                </div>
                                
                                <!--action=" { { route('carrinho.remove', $order->id) }} -->
                                <a href="#" onclick="carrinhoRemoverProduto({{ $order->id }}, {{ $pedido_compra->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">
                                    <img src="{{ asset('images/icons/trash-icon.png') }}" alt="Delete product" width="20px" height="20px" style="margin-right: 8px;">
                                </a>

                            </td>
                            <td> {{ $pedido_compra->produto->name }} </td>
                            <td>R$ {{ number_format($pedido_compra->produto->preco, 2, ',', '.') }} </td>
                            @php
                                $total_pedido += $pedido_compra->produto->preco;
                            @endphp
                            <td>R$ {{ number_format($pedido_compra->Qtd * $pedido_compra->produto->preco, 2, ',', '.') }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <strong class="col offset-16 offset-m6 offset-s6 14 m4 s4 right-align">Total do Pedido: </strong>
                <span class="col 12 m2 s2"> R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>

            <div class="row">
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

@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush
