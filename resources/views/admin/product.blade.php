@extends('layouts.admin',['module'=>'produk','judul'=>'Data Produk '])
@section('title')
    <title>Data Produk</title>
@endsection
@section('content')
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <p class="ml-4"> Data produk adalah kumpulan barang produk yang akan dijual kepada konsumen. Dalam menu ini digunakan untuk menambah produk baru, edit, restock, dan hapus produk.</p><br>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.card')
                            @slot('title')
                            <a href="{{ route('produk.create') }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> Tambah
                            </a>
                            @endslot
                            
                            @if (session('success'))
                                <x-alert>
                                    <x-slot name='type'>
                                        success
                                    </x-slot>
                                    {!! session('success') !!}
                                </x-alert>
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-bold " style="color:black">
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Last Update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $row)
                                        <tr>
                                            <td>
                                                {{ $row->code }}
                                            </td>
                                            <td>
                                                <strong>{{ ucfirst($row->name) }}</strong>
                                            </td>
                                            <td><a id="todolink" title="Edit Stock" data-toggle="modal" data-name="{{ $row->name}}" data-id= "{{$row->id}}" data-book-id="{{$row->stock}}"  class="open-modal-sm btn btn-info btn-sm text-right" href="#modal-sm">{{ $row->stock }} <sub>{{$row->unit->name}}</sub></a></td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>{{ $row->category->name }}</td>
                                            <td>{{ $row->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('produk.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('produk.edit', $row->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {!! $products->links() !!}
                                </div>
                            </div>
                            @slot('footer')
    ​
                            @endslot
                        @endcomponent
                        <!-- Modal -->
                        <div class="modal fade" id="modal-sm">
                            <div class="modal-dialog modal-sm" >
                            <form action="{{ route('update-stock') }}" method="post">
                                {{ csrf_field() }}
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Re-Stock Produck</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container text-center">
                                        <div class="row ">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label >Nama Product</label> 
                                                    <input class="form-control text-center mb-2" type="text" name="name" value="" disabled/>  
                                                    <input class="form-control" type="hidden" name="id" value="" /> 
                                                    <label >Stock awal</label> 
                                                    <input class="form-control text-center mb-2" type="text" name="qty" value="" disabled/>   
                                                    <label >Tambah Stock</label> 
                                                    <input class="form-control text-center" type="text" name="stock" value="" />                                                    
                                                </div>        
                                            </div>    
                                        </div>                    
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Ubah Stock </button>
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                         <!-- END Modal -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection