<?php

namespace App\Http\Controllers;

use App\Order_detail;
use App\Product;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request->product_id)) {
            $produk= Product::findOrFail($request->product_id);
            if ($produk->stock > $request->qty) {
                $order_detail= new Order_detail;
                $order_detail->order_id=$request->order_id;
                $order_detail->product_id=$request->product_id;
                $order_detail->qty=$request->qty;
                
                $subtotoal=$request->qty*$produk->price;
                $order_detail->price=$subtotoal;
                $order_detail->save();
                //return redirect('/transaksi-kasir');
                return redirect("/transaksi-kasir-create/$request->order_id")
                ->with(['success' => '<strong>'.$produk->name.'</strong> berhasil ditambahkan sebanyak <strong>'.$order_detail->qty.' '.$produk->unit->name.'</strong>']);
            }else{
                return redirect()->back()
                ->with(['error' => 'Stok tidak cukup, stok <strong>'.$produk->name.'</strong> tersisa <strong>'.$produk->stock.' '.$produk->unit->name.'</strong>']);
            }
        }else{
            return redirect()->back()
            ->with(['error' => 'Silahkan pilih produk']);
        }
        
    }
    public function destroy($id)
    {
        $products = Order_detail::findOrFail($id);
        $products->delete();
        return redirect()->back()->with(['success' => 'Produk Telah Dihapus!']);
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
