<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SaleOrder;

class Order extends Model
{
    public function pedido_compra()
    {
        return $this->hasMany('App\Models\SaleOrder')
            ->select( \DB::raw('product_id, count(1) as qtd') )
            ->groupBy('product_id')
            ->orderBy('product_id', 'desc');
    }
}
