<?php

namespace App;
use App\Order_detail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail');
    }
}
