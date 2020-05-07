@extends('layouts.kasir',['module'=>'transaksi','judul'=>"Transaksi Produk $order->invoice "])
@section('title')
    <title>Dashboard Transaksi</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="card">
                    @if (session('error'))
                    <x-alert>
                        <x-slot name='type'>
                            danger
                        </x-slot>
                        {!! session('error') !!}
                        </x-alert>
                    @endif
                    @if (session('success'))
                        <x-alert>
                            <x-slot name='type'>
                                success
                            </x-slot>
                            {!! session('success') !!}
                        </x-alert>
                    @endif

                    <div class="card-header">   
                        <form action="{{ route('orderdetail.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                <label>Pilih Produk</label>
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Produk</label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">    
                                <div class="input-group no-border">
                                  <select name="product_id" class="form-control select2bs4" style="width: 70%; color:black;" required>
                                      <option selected>Pilih Produk..</option>
                                      @foreach ($product as $option)
                                         <option value="{{$option->id}}">{{$option->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>       
                            <div class="col-md-1">
                                <input type="number" class="form-control" value="1" name="qty" id="" min="1" step="0.01" autofocus>
                                <input type="hidden" value="{{$order->id}}" name="order_id">
                            </div>       
                            <div class="col-md-2 ">
                                <input class="btn btn-info ml-4" type="submit" value="Tambah">
                            </div>
                        </div>
                        </form>  
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-bold " style="color:black">
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Stock</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; $total=0;@endphp
                                            @forelse ($order_detail as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->product->name}}</td>
                                                <td>{{ $row->product->stock}} </td>
                                                <td>{{ $row->qty }} <sub>{{$row->product->unit->name}}</sub></td>
                                                <td>Rp.{{ number_format($row->product->price)}}</td>
                                                <td>Rp.{{  number_format($row->qty*$row->product->price )}}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('orderdetail.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a id="todolink" data-toggle="modal" data-id= "{{$row->id}}" data-book-id="{{$row->qty}}"  class="open-modal-sm btn btn-warning btn-sm" href="#modal-sm"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
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
                                            <label>Total Tagihan</label>
                                            <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input class="form-control mb-3" value="Rp.{{ number_format($total)}}" disabled>
                                            <input type="hidden" name="total" value="{{ $total }}">
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <link href="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.min.js"></script>
                                            <label>Bayar</label>
                                                <div class="form-group">                                                    
                                                    <div class="input-group">
                                                        <span class="input-group-prepend"><div class="input-group-text">Rp</div></span>
                                                        <input type="text" class="form-control" name="bayar" id="bayar"  autocomplete="off" >
                                                    </div>
                                                    
                                                </div>  
                                            <div class="form-group">
                                                <button class="btn btn-primary submit" id="submit">
                                                    <i class="fa fa-send"></i> Bayar
                                                </button>
                                               
                                            </div>
                                            </form>
                                            <form action="{{ route('transaksi.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger float-right">Batalkan Transaksi</button>
                                            </form>
                                            <script>
                                                $('#submit').on('click',function() {
                                                var input = $('#bayar').val();
                                                    if (input < {{$total}}) {
                                                        sweetAlert("ERROR", "Jumlah yang dibayarkan kurang", "warning");
                                                        return false;
                                                    }
                                                });
                                            </script>                       
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-sm">
                                    <div class="modal-dialog" >
                                    <form action="{{ route('update-qty') }}" method="post">
                                        {{ csrf_field() }}
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Primary Modal</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" name="id" value=""/>  
                                                <input type="text" name="qty" value=""/>                                                      
                                            </div>                                    
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success">
                                        </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                 <!-- END Modal -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection