@extends('recette.template')
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
        <p class="card-header-title">Recette: {{$total_recette }} TND</p>
      
       @csrf
       <div class="select">
            
            <select name="user_caissier_id" id="user_caissier_id">
                      <option value=""  >Serveur</option>
                     @foreach($serveurs as $serveur)
                     <option  value="{{$serveur->id }}"  {{ $idServer == $serveur->id ? 'selected' : '' }}>{{$serveur->nom}}</option>  
                     @endforeach
             </select>


        </div>
        <a class="button is-info "> <input type="date" name="date" id="date" value="{{$test1}}"></a>
        <a class="button is-link" href="" id="recherche" >search</a>
      


        
        
    
    </header>

        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <tr>              

                            <th>Total</th>
                            <th>nbr produit</th>
                            <th>date</th>     
                            <th>detail</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commandes as $commande)
                            <tr>

                               <td>{{ $commande->total_facture }} TND</td>
                               <td>{{$commande->nbr_product}}</td>
                               <td>{{ $commande->created_at }}</td>
                               <td><a class="button is-primary" href="{{ route('commandes.show', $commande->id) }}">Voir</a></td>
                               <td><button class="button is-primary" onclick="bonjour('{{ $commande->id }}');">Voir</button></td>
                            </tr>
                           
                        @endforeach
                        
                       
                      
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <footer class="card-footer">
            {{ $commandes->links() }}
  </footer>
<div id="reponse">
   
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Facture detail</h4>
            </div>
            <div class="modal-body">
            <table class="table is-hoverable" id="table_detail">
                    <thead>
                        <tr>  
                            
                            <th>name product</th>
                            <th>quantite</th>
                            <th>price unit</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                   
                                <tr>
                                   <td> </td>
                                   <td> </td>
                                   <td> </td>
                                   <td></td>
                                </tr>
                   
                     <tr>
                           <td><strong>Total Facture:</strong></td>
                           <td><strong></strong></td>
                     </tr>
                   
                    </tbody>
                </table>   

            </div>
        </div>
    </div>
</div>
<!--modal-->


@endsection

@section('script')
<script>
 //alert($('#recherche').attr('href'));
//var pathname = window.location.pathname; // Returns path only (/path/example.html)
//var url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
var origin   = window.location.origin;   // Returns base URL (https://example.com)

//alert(origin);
$("#recherche").click(function(e){

   if( $('#recherche').attr('href')=="#" && ($("select#user_caissier_id").val().length == 0) ){
        alert("tu dois choisir une date ou une date avec un serveur");
   }else if($('#recherche').attr('href')=="#" && !isNaN($("select#user_caissier_id").val())){
        alert("tu dois choisir une date");
   }
   
});

$("select#user_caissier_id").click(function(e){

      //alert(e.target.value);
      var a = e.target.value;
      if(!isNaN(a) && a.length > 0){
          if($('#date').val().length > 0 ){
              b = $('#date').val();
            $('#recherche').attr('href',origin+'/laravel/laravel_8_pos/recette/search/user-date/'+a+'/'+b);
           // document.getElementById('recherche').href ='http://localhost/laravel/laravel_8_pos/public/recette/search/user-date/'+a+'/'+b;
          }
    }else{
        if($('#date').val().length > 0 ){
              b= $('#date').val();
            $('#recherche').attr('href',origin+'/laravel/laravel_8_pos/recette/search/date/'+b);
          //  document.getElementById('recherche').href ='http://localhost/laravel/laravel_8_pos/public/recette/search/date/'+b;
          }
    }

    });


    $("#date").change(function(e){ 
       
       
            var  a =  $("select#user_caissier_id").val();
     if(!isNaN(a) && a.length > 0){
         $('#recherche').attr('href',origin+'/laravel/laravel_8_pos/recette/search/user-date/'+a+'/'+e.target.value); 
        // document.getElementById('recherche').href ='http://localhost/laravel/laravel_8_pos/public/recette/search/user-date/'+a+'/'+e.target.value;
     }else{
          $('#recherche').attr('href',origin+'/laravel/laravel_8_pos/recette/search/date/'+e.target.value);
         // document.getElementById('recherche').href ='http://localhost/laravel/laravel_8_pos/public/recette/search/date/'+e.target.value;
        }
    });
 
       
        function bonjour(a) {
          $.ajax({
                    url: 'commandes/ajaxshow/'+a+'',
                    type:'GET',
                    data:"",
                    success: function(data) {
 
                       $('#table_detail tbody').html('');
                       size = data.length
                       var totall = 0;
                       for(var i=0;i<size;i++){
                        $('#table_detail tbody').append('<tr><td>'+
                            data[i].name+'</td><td>'+data[i].quantite+'</td><td>'+data[i].price_unit+' TND</td><td>'+data[i].total+' TND</td></tr>'
                            );
                            totall += data[i].total;
                       }
                       $('#table_detail tbody').append('<tr><td><strong>Total facture</strong> </td><td>'+totall+' TND</td></td>');
                       $('#myModal').modal();
                    }
                });
        }
        </script>
@endsection


