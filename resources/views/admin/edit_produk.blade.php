@extends('layouts.admin',['module'=>'produk','judul'=>'Tambah Produk '])
@section('title')
    <title>Tambah Data Produk</title>
@endsection
@section('content')
<div class="content">
    <div class="content">
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @component('components.card')
                            @slot('title')
                            <i class="nav-icon fas fa-cubes"></i>
                            @endslot
                            
                            @if (session('error'))
                                <x-alert>
                                    <x-slot name='type'>
                                        danger
                                    </x-slot>
                                    {!! session('error') !!}
                                </x-alert>
                            @endif
                            <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="">Kode Produk</label>
                                    <input type="text" name="code"  
                                        maxlength="10"
                                        value="{{ $product->code }}"
                                        class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="name" required 
                                        value="{{ $product->name }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="description" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $product->description }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <select name="unit_id" id="unit_id" 
                                        required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($units as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->unit_id ? 'selected':'' }}>
                                                {{ ucfirst($row->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('unit_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category_id" id="category_id" 
                                        required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->category_id ? 'selected':'' }}>
                                                {{ ucfirst($row->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" name="price" required 
                                        value="{{ $product->price }}"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @if (!empty($product->photo))
                                        <hr>
                                        <img src="{{ asset('uploads/product/' . $product->photo) }}" 
                                            alt="{{ $product->name }}"
                                            width="150px" height="150px">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
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