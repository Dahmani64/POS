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
        <p class="card-header-title">Products</p>
        <div class="select">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('products.index') }}" @unless($name) selected @endunless>Toutes catégories</option>
                @foreach($categories as $category)
                    <option value="{{ route('products.category', $category->name) }}" {{ $name == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <a class="button is-info" href="{{ route('products.create') }}">Créer un produit</a>
    </header>

        <div class="card-content" id="container-paginate">
        @include('products.paginate')
        </div>
    </div>
      
                   
@endsection

@section('script')
<script>
/*
$(document).ready(function(){
 
 $(document).on('click', 'footer a', function(event){
 $('#container-paginate table').html('<img style="margin-left:50%;margin-top:100px;" src="http://localhost/laravel/laravel_8_pos/public/assets/images/wait.gif">');
 event.preventDefault(); 
     var page = $(this).attr('href').split('page=')[1];
     fetch_data(page);
 });
 
 function fetch_data(page)
 {
    $.ajax({
        url:"get_ajax_data?page="+page,
        type:'GET',
        data:"",
        success:function(data)
        {
                $('#container-paginate').html(data);
         }
    });
 } 
 
}); 
*/
</script>
@endsection