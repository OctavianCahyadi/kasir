<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\Order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function new_order()
    {
        $id=Auth::user()->id;
        //create Order baru
        $order= new Order;
        $order->save();
        $invoice = 'T'.$order->id.'-'.time().'00-'.$id;
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
        $order= Order::select()->where('user_id',$id)->orderBy('created_at', 'DESC')->paginate(7);
        return view('kasir.show_transaksi',compact('order'));
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('/transaksi-kasir')->with(['success' => 'Transaksi: ' . $order->name . ' Telah Dihapus']);
    }
    public function store(Request $request)
    {
        $order= Order::findOrFail($request->order_id);
        $order->total=$request->total;
        $order->payment=$request->bayar;
        $kembalian=$request->bayar - $request->total;
        $order->payback=$kembalian;
        $order->save();
        $order_id=$order->id;
        $order_detail = Order_detail::select()->where('order_id',$order_id)->get();
        $product =Product::select()->get();

        foreach ($order_detail as $key) {
            foreach ($product as $item) {
                if ($item->id == $key->product_id) {
                    $newstock=$item->stock-$key->qty;
                    $temp=Product::findOrFail($key->product_id);
                    $temp->stock=$newstock;
                    $temp->save();
                }
            }
        }
        //dd($order_detail);
        return redirect("/show_result_order/$order_id");
        
    }
    public function show_result($order_id)
    {
        $order= Order::findOrFail($order_id);
        $order_detail = Order_detail::select()->where('order_id',$order_id)->get();
        return view('kasir.result_order',compact('order','order_detail'));
    }
}
