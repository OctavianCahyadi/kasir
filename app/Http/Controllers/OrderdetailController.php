<?php

namespace App\Http\Controllers;

use App\Order_detail;
use App\Product;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    public function tambah(Request $request)
    {
        $order_detail= new Order_detail;
        $order_detail->order_id=$request->order_id;
        $order_detail->product_id=$request->product_id;
        $order_detail->qty=$request->qty;
        $produk= Product::findOrFail($request->product_id);
        $subtotoal=$request->qty*$produk->price;
        $order_detail->price=$subtotoal;
        $order_detail->save();
        //return redirect('/transaksi-kasir');
        return redirect("/transaksi-kasir-create/$request->order_id");
    }
    
}
