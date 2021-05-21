@extends('products.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Add Product</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                <div class="field">
                          <label class="label">Catégorie</label>
                    <div class="select">
                        <select name="category_id">
                            @foreach($categories as $category)
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                    <div class="field">
                        <label class="label">Name Product</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Name of Product">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Price Product</label>
                        <div class="control">
                          <input class="input" type="text" name="price" value="{{ old('price') }}">
                        </div>
                        @error('price')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button  class="button is-link">Envoyer</button>
                          <a class="button is-primary" href="{{ route('products.index') }}">Return</a>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
@endsection