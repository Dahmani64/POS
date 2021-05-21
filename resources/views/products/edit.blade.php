@extends('products.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Edit Product</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="field">
                        <label class="label">Name Product: </label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Name od product">
                        </div>
                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Price Product:</label>
                        <div class="control">
                          <input class="input" type="text" name="price" value="{{ old('price', $product->price) }}" min="1" max="100">
                        </div>
                        @error('year')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                          <a class="button is-primary" href="{{ route('products.index') }}">Return</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection