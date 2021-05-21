@extends('serveur.template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Add Server</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('serveurs.store') }}" method="POST">
                    @csrf
              
                    <div class="field">
                        <label class="label">Name Serveur</label>
                        <div class="control">
                          <input class="input @error('nom') is-danger @enderror" type="text" name="nom" value="{{ old('nom') }}" placeholder="Name of Server">
                        </div>
                        @error('nom')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                  
                    <div class="field">
                        <div class="control">
                          <button  class="button is-link">Envoyer</button>
                          <a class="button is-primary" href="{{ route('serveurs.index') }}">Return</a>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
@endsection