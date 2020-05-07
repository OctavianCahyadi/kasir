<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_detail;

class DetailController extends Controller
{
    public function tambah(Request $request)
    {
        
        $order_detail= new Order_detail;
        $order_detail->order_id=$request->order_id;
        $order_detail->product_id=$request->product_id;
        $order_detail->qty=$request->qty;
        
        $subtotoal=$request->qty*1000;
        $order_detail->price=$subtotoal;
        $order_detail->save();
        return redirect('transaksi-kasir');
    }
}
