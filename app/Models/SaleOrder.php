<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'status',
        'valor'
    ];
    
    public function produto()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
