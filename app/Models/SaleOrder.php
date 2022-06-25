<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    public function produto()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
