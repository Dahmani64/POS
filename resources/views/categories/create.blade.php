@extends('categories.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Add Category</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Name Category</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Name of category">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    <div class="field">
                        <div class="control">
                          <button  class="button is-link">Envoyer</button>
                          <a class="button is-primary" href="{{ route('categories.index') }}">Return</a>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
@endsection