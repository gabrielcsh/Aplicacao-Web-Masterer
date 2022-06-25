<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CarrinhoController extends Controller
{
    function __construct()
    {
        // Só direciona o usuário para o carrinho se estiver logado
        $this->middleware('auth');
    }

    public function index() 
    {
        $pedidos = Order::where(['status' => 'reservado', 'user_id' => "Auth::id()"])->get();

        $pedidos = Order::where([
            'status' => 'reservado'
            //'user_id' => Auth::id()
        ])->get();
        
        dd([
            $pedidos,
            $pedidos[0]->pedido_compra,
            $pedidos[0]->pedido_compra[0]->produto
        ]);
        
        //return view('carrinho', compact('pedidos'));
        return view('carrinho', [
            'pedidos' => $pedidos
        ]);
    }
}
