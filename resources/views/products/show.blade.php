@extends('products.template')
@section('content')
@if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Info Product</p>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>  
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Id Product:</td>
                        <td>{{ $product->id }}</td> 
                    </tr>                 
                    <tr>
                         <td>Name Product:</td>
                         <td>{{ $product->name }}</td> 
                    </tr>
                    <tr>
                       <td>Price Product:</td>
                       <td>{{ $product->price }} TND</td>
                    </tr>
                    <!--
                    <tr>
                         <td>Category:</td>
                         <td>{{ $product->category->name }} </td>
                     </tr>
                     -->
                     <tr>
                     <td>Category:</td>
                         <td>{{ $category }} </td>
                    </tr>
                    <tr>
                    <td><a class="button is-primary" href="{{ route('products.index') }}">Return</a></td>   
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection