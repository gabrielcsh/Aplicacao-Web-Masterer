@extends('layouts.app')

@section('content')
<div class=container>
    <div class="row">
        <h3>Produtos no Carrinho</h3>
        <hr/>
        @php
            echo var_dump($pedidos);
        @endphp
        @forelse ($pedidos as $order)
            <h5 class="col 16 s12 m6"> Pedido: {{ $order->id }} </h5>
            <h5 class="col 16 s12 m6"> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
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
                                <img width="100" height="100" src="{{ $pedido_compra->produto->imagem }}">
                            </td>
                            <td class="center-align">
                                <div class="center-align">
                                    <a class="col 14 m4 s4" href="#">
                                        <i class="material-icons small">remove_circle_outline</i>
                                    </a>
                                    <span class="col 14 m4 s4"> {{ $pedido_compra->Qtd }} </span>
                                    <a class="col 14 m4 s4" href="#">
                                        <i class="material-icons small">add_circle_outline</i>
                                    </a>
                                </div>
                                <a href="#" class="tooltipped" data-position="right" data-delay="50"
                                data-tooltip="Retirar produto do Carrinho?">Retirar Produto</a>
                            </td>
                            <td> {{ $pedido_compra->produto->nome }} </td>
                            <td> {{ number_format($pedido_compra->produto->valor, 2, ',', '.') }} </td>
                            @php
                                $total_pedido += $pedido_compra->valores;
                            @endphp
                            <td>R$ {{ number_format($pedido_compra->valores, 2, ',', '.') }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <strong class="col offset-16 offset-m6 offset-s6 14 m4 s4 right-align">Total do Pedido: </strong>
                <span class="col 12 m2 s2"> R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>
            <div class="row">
                <a class="btn-large tooltipped col 14 s4 m4 offset-18 offset-s8 offset-m8"
                data-position="top" data-delay="50" data-tooltip="Selecionar mais produtos" 
                href="{{ route('index') }}">Continuar Comprando!</a>
                <span class="col 12 m2 s2"> R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>
        @empty
            <h5> Não há nenhum produto no Carrinho
        @endforelse
    </div>
    
</div>

