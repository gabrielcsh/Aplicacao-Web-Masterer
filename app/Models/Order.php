<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SaleOrder;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

     /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pedido_compra()
    {
        return $this->hasMany('App\Models\SaleOrder')
            ->select( \DB::raw('product_id,  sum(valor) as valores, count(1) as Qtd') )
            ->groupBy('product_id')
            ->orderBy('product_id', 'desc');
    }
    
    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }

    public function sale_orders_itens()
    {
        return $this->hasMany('App\Models\SaleOrder');
    }
}
