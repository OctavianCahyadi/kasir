@extends('layouts.admin',['module'=>'produk','judul'=>'Tambah Produk '])
@section('title')
    <title>Tambah Data Produk</title>
@endsection
@section('content')
<div class="content">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @component('components.card')
                        @slot('title')
                        
                        @endslot
                        
                        @if (session('success'))
                            <x-alert>
                                <x-slot name='type'>
                                    success
                                </x-slot>
                                {!! session('success') !!}
                            </x-alert>
                        @endif
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode Produk</label>
                                <input type="text" name="code" required 
                                    maxlength="10"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="name" required 
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="description" 
                                    cols="5" rows="5" 
                                    class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stock" required 
                                    class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('stock') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" required 
                                    class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="category_id" id="category_id" 
                                    required class="form-control {{ $errors->has('categori_id') ? 'is-invalid':'' }}">
                                    <option value="">Pilih</option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('category_id') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="photo" class="form-control">
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-send"></i> Simpan
                                </button>
                            </div>
                        </form>
                        @slot('footer')
​
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
</div>
@endsection