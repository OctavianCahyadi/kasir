<?php

namespace App;

use App\Order_detail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function order_detail()
    {
        return $this->hasMany('App\order_detail');
    }
    public function unit()
    {
        return $this->belongsTo(unit::class);
    }
}
