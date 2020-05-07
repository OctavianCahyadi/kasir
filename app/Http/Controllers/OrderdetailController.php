<?php

namespace App\Http\Controllers;

use App\Order_detail;
use App\Product;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    public function store(Request $request)
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
    public function destroy($id)
    {
        $products = Order_detail::findOrFail($id);
        $products->delete();
        return redirect()->back()->with(['success' => '<strong>' . $products->name . '</strong> Telah Dihapus!']);
    }
    public function updateqty(Request $request)
    {
        //dd($request);
        $orderdetail=Order_detail::findOrFail($request->id);
        $orderdetail->qty=$request->qty;
        $orderdetail->save();
        return redirect()->back()->with(['success' => 'Jumlah Produk Telah di perbaharui !']);
        
    }
}
