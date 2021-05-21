@extends('serveur.template')
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
<!--
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
-->
@if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif

    
    <div class="card">

    <header class="card-header">
        <p class="card-header-title">Serveur</p>
        
        <a class="button is-info" href="{{ route('serveurs.create') }}">Créer un serveur</a>
    </header>

        <div class="card-content" id="container-paginate">
        <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            
                            <th>Id</th>
                            <th>Name</th>
                            <th>role</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serveurs as $serveur)
                            <tr>
                              
                                <td>{{ $serveur->id }}</td>
                                <td>{{ $serveur->nom }}</td>
                                <td>{{ $serveur->role }}</td>
                                <td>
                                    <form action="{{ route('serveurs.destroy', $serveur->id) }}" method="post">
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
                  <footer class="card-footer">
                   {{ $serveurs->links() }}
                </footer>
        </div>
    </div>
      
                   
@endsection

@section('script')
<script>
</script>
@endsection