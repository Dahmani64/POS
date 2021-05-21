<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
   <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href="http://localhost/psd/bootstrap/css/bulma.min.css">
   
    
 <link rel="stylesheet" href="http://localhost/psd/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
 -->
 <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" />

 <link rel="stylesheet" href="{{url('assets/css/index.css')}}">

  <!-- Styles     
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    -->
   <!-- Scripts      
   <script src="{{ asset('js/app.js') }}" defer></script>
   -->
  </head>
  <body>
  <div id="bartools">
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand" href="#">Caisse</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('caisse.index')}}">Caisse <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('commandes.index')}}">Recette</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('products.index')}}">Manage Products</a>
          <a class="dropdown-item" href="{{route('categories.index')}}">Manage Categories</a>
          <a class="dropdown-item" href="{{route('serveurs.index')}}">Manage Serveur</a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#">{{ Auth::user()->name }} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
       <form action="{{route('logout')}}" method="post">
              @csrf
           <input class="nav-link btn btn-outline" style="border:none;opacity:1;" type="submit" value="LogOut">
        </form>
      </li>

    </ul>
  </div>
</nav>
</div>
            @yield('content')
        
     <script src="{{url('assets/js/jquery-3.4.1.js')}}">
    </script>
    <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}">
    </script>
    <script src="{{url('assets/js/caisse.js')}}">
    </script>
   
   
  </body>
</html>