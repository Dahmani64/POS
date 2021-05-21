@extends('products.template')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
    margin: 0.3em;
}
    </style>
@endsection
@section('content')
@if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">

    <header class="card-header">
        <p class="card-header-title">Categories</p>

        <a class="button is-info" href="{{ route('categories.create') }}">Créer un Catégory</a>
    </header>

        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            
                            <th>Id</th>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $product)
                            <tr>
                              
                                <td><strong>{{ $product->id }}</strong></td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <form action="{{ route('categories.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="card-footer">
            {{ $categories->links() }}
        </footer>
@endsection