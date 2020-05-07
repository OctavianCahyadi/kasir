@extends('layouts.admin',['module'=>'satuan','judul'=>'Edit Satuan Produk'])
@section('title')
    <title>Edit Satuan Produk</title>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @component('components.card')
                        @slot('title')
                        Edit
                        @endslot
                        
                        @if (session('error'))
                            <x-alert>
                                <x-slot name='type'>
                                    danger
                                </x-slot>
                                {!! session('error') !!}
                             </x-alert>
                        @endif
​
                        <form role="form" action="{{ route('satuan.update', $units->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="name">Satuan</label>
                                <input type="text" 
                                    name="name"
                                    value="{{ $units->name }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $units->description }}</textarea>
                            </div>
                        @slot('footer')
                            <div class="card-footer">
                                <button class="btn btn-info">Update</button>
                            </div>
                        </form>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
</div>
@endsection