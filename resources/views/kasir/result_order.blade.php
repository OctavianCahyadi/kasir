@extends('layouts.kasir',['module'=>'transaksi','judul'=>"Report Transaksi Produk $order->invoice "])
@section('title')
    <title>Dashboard Transaksi</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-bold " style="color:black">
                                                <th>no</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; $total=0;@endphp
                                            @forelse ($order_detail as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->product->name}}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>Rp.{{ number_format($row->product->price)}}</td>
                                                <td>Rp.{{  number_format($row->qty*$row->product->price )}}</td>
                                                @php
                                                    $total = $total+($row->qty*$row->product->price);
                                                @endphp
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada data</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><strong>Total Tagihan</h5></strong>
                                            <div class="form-group ml-3 mr-3">                                                    
                                                <div class="input-group">
                                                    <span class="input-group-prepend"><div class="input-group-text">Rp</div></span>
                                                    <input type="text" class="form-control" value="{{ number_format($total)}}" disabled>
                                                </div>
                                            </div>  
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <link href="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.min.js"></script>
                                            <h5><strong>Dibayarkan</h5></strong>
                                            <div class="form-group ml-3 mr-3">                                                    
                                                <div class="input-group">
                                                    <span class="input-group-prepend"><div class="input-group-text">Rp</div></span>
                                                    <input type="text" class="form-control" value="{{ number_format($order->payment)}}" name="bayar" id="bayar" disabled>
                                                </div>
                                            </div>  
                                            <h5><strong>Kembalian</h5></strong>
                                            <div class="form-group ml-3 mr-3">                                                    
                                                <div class="input-group">
                                                    <H3><strong>Rp {{ number_format($order->payback) }}</strong></H3>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <a class="btn btn-warning ml-2 mr-2" onclick="window.open('', '_self', ''); window.close();"> Kembali</a>
                                                <button class="btn btn-primary submit mr-2 ml-2" onclick="myFunction()">Cetak Nota</button>
                                                <script>
                                                    function myFunction() {
                                                      window.open("/transaksi-kasir", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
                                                    }
                                                </script>
                                            </div>        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection