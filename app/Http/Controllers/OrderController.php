<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\Order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store_order()
    {
        $id=Auth::user()->id;
        $invoice = 'T'.time().'00'.$id;
       
        //create Order baru
        $order= new Order;
        $order->invoice=$invoice;
        $order->user_id=$id;
        $order->save();
        return redirect("/transaksi-kasir-create/$order->id");
    }
    public function create_transaksi($id)
    {        
        $product=Product::select()->get();
        $order= Order::findorFail($id);
        //dd($order);
        $order_detail = Order_detail::select()->where('order_id',$id)->get();
        //dd($order_detail);
        return view('kasir.transaksi',compact('product','order','order_detail'));
    }

    public function transaksi()
    {
        $id=Auth::user()->id;
        $order= Order::select()->where('user_id',$id)->paginate(5);
        return view('kasir.show_transaksi',compact('order'));
    }
    
}
