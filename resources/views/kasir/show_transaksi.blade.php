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
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    @component('components.card')
                                        @slot('title')
                                        <a href="{{ route('transaksi-store') }}" 
                                            class="btn btn-primary btn-sm" target="_blank">
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
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-bold " style="color:black">
                                                    <th>no</th>
                                                    <th>Invoice</th>
                                                    <th>Barang</th>
                                                    <th>Total</th>
                                                    <th>kembalian</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @forelse ($order as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->invoice}}</td>
                                                    <td>
                                                        @foreach($row->order_detail as $t)
                                                            {{$t->product->name}},
                                                        @endforeach
                                                    </td>
                                                    <td >{{ $row->total }}</td>
                                                    <td >{{ $row->payback }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('transaksi.destroy', $row->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="/show_result_order/{{ $row->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Belum ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="float-right">
                                            {!! $order->links() !!}
                                        </div>
                                    </div>
                                    @slot('footer')        ​
                                @endslot
                            @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection