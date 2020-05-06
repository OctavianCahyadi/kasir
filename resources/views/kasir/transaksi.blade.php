@extends('layouts.kasir',['module'=>'transaksi','judul'=>'Transaksi Produk'])
@section('title')
    <title>Dashboard Transaksi</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="card">
                    <div class="card-header">   
                        <form action="/tambah-produk" method="get" enctype="multipart/form-data">
                            
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
                                <input type="number" class="form-control" value="1" name="qty" id="" min="1">
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
                                                <th>no</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
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
                                                <td>
                                                    <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
                                <script type="text/javascript">
                                    $(document).ready(function(){
                        
                                        // Format mata uang.
                                        $( '.uang' ).mask('000.000.000', {reverse: true});
                        
                                    })
                                </script>
                                <div class="col-md-4">
                                   
                                    <div class="card">
                                        <div class="card-body">
                                            <label>Total Tagihan</label>
                                            <input class="form-control mb-3" value="Rp.{{ number_format($total)}}" disabled>
                                            <label>Dibayar</label>
                                            <link href="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/sweetalert/1.1.3/sweetalert.min.js"></script>
                                                <div class="form-group">
                                                    <input type="text" id="bayar" class="form-control mb-2" name="bayar"  autocomplete="off">
                                                    <button class="btn btn-primary demo1" type="submit" id="submit" data-toggle="modal" data-target="#modal-primary" >BAYAR</button>
                                                </div>  
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
                                <!-- /.modal -->
                                <div class="modal fade" id="modal-primary">
                                    <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Lanjutkan Transaksi ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>{{request('bayar')}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-outline-light">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection