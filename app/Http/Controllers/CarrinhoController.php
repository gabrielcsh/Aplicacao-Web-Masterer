<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\SaleOrder;

class CarrinhoController extends Controller
{
    function __construct()
    {
        // Só direciona o usuário para o carrinho se estiver logado
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index() 
    {

        $pedidos = Order::where([
            'status' => 'reservado',
            'user_id' => Auth::id()
        ])->get();
        
        /*dd([
            $pedidos,
            $pedidos[0]->pedido_compra,
            $pedidos[0]->pedido_compra[0]->produto
        ]);*/
        
        //return view('carrinho', compact('pedidos'));
        return view('carrinho.index', [
            'pedidos' => $pedidos
        ]);
    }
    
    public function adicionar()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('id');

        $produto = Product::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('carrinho.index');
        }

        $idusuario = Auth::id();

        $idpedido = Order::consultaId([
            'user_id' => $idusuario,
            'status'  => 'reservado'
            ]);

        if( empty($idpedido) ) {
            $pedido_novo = Order::create([
                'user_id' => $idusuario,
                'status'  => 'reservado'
                ]);

            $idpedido = $pedido_novo->id;
            
        }

        SaleOrder::create([
            'order_id'  => $idpedido,
            'product_id' => $idproduto,
            'valor'      => $produto->preco,
            'status'     => 'reservado'
            ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho.index');

    }

    public function remover()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('order_id');
        $idproduto          = $req->input('product_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Order::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'reservado'            ]);

        if( empty($idpedido) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $where_produto = [
            'order_id'  => $idpedido,
            'product_id' => $idproduto
        ];

        $produto = SaleOrder::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('carrinho.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        SaleOrder::where($where_produto)->delete();

        $check_pedido = SaleOrder::where([
            'order_id' => $produto->order_id
            ])->exists();

        if( !$check_pedido ) {
            Order::where([
                'id' => $produto->order_id
                ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }

    public function concluir()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido  = $req->input('order_id');
        $idusuario = Auth::id();

        $check_pedido = Order::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'reservado'
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $check_produtos = SaleOrder::where([
            'order_id' => $idpedido
            ])->exists();
        if(!$check_produtos) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.index');
        }

        SaleOrder::where([
            'order_id' => $idpedido
            ])->update([
                'status' => 'pago'
            ]);
        Order::where([
                'id' => $idpedido
            ])->update([
                'status' => 'pago'
            ]);

        $req->session()->flash('mensagem-sucesso', 'Compra concluída com sucesso!');

        return redirect()->route('carrinho.compras');
    }

    public function compras()
    {

        $compras = Order::where([
            'status'  => 'pago',
            'user_id' => Auth::id()
            ])->orderBy('created_at', 'desc')->get();

        $cancelados = Order::where([
            'status'  => 'cancelado',
            'user_id' => Auth::id()
            ])->orderBy('updated_at', 'desc')->get();

        //return view('carrinho.compras', compact('compras', 'cancelados'));
        return view('carrinho.COMPRAS', [
            'compras' => $compras,
            'cancelados' => $cancelados
        ]);
    }

    public function cancelar()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido       = $req->input('order_id');
        $idspedido_prod = $req->input('id');
        $idusuario      = Auth::id();

        if( empty($idspedido_prod) ) {
            $req->session()->flash('mensagem-falha', 'Nenhum item selecionado para cancelamento!');
            return redirect()->route('carrinho.compras');
        }

        $check_pedido = Order::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'pago'
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para cancelamento!');
            return redirect()->route('carrinho.compras');
        }

        $check_produtos = SaleOrder::where([
                'order_id' => $idpedido,
                'status'    => 'pago'
            ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_produtos ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.compras');
        }

        SaleOrder::where([
                'order_id' => $idpedido,
                'status'    => 'pago'
            ])->whereIn('id', $idspedido_prod)->update([
                'status' => 'cancelado'
            ]);

        $check_pedido_cancel = SaleOrder::where([
                'order_id' => $idpedido,
                'status'    => 'pago'
            ])->exists();

        if( !$check_pedido_cancel ) {
            Order::where([
                'id' => $idpedido
            ])->update([
                'status' => 'cancelado'
            ]);

            $req->session()->flash('mensagem-sucesso', 'Compra cancelada com sucesso!');

        } else {
            $req->session()->flash('mensagem-sucesso', 'Item(ns) da compra cancelado(s) com sucesso!');
        }

        return redirect()->route('carrinho.compras');
    }

}
