@extends('caisse.template')
@section('content')



<!--
   <div class="row" id="bartools" style="width: 100%; background-color: #efefef;">
     
     <div class="row" style="padding :0px;">
         <div class="col-xs-1" style=" padding:0px;" >
              <button id="caissier" style="margin:0px;">Caisse</button>
        </div> 
         <div class="col-xs-1"><button id="recette">Recette</button></div>
         <div class="col-xs-2"><button id="gererAricle">Gerer Article</button></div>
         <div class="col-xs-2"><button id="gererUser">Gerer user</button></div>
         <div class="col-xs-1"><button id="setting">setting</button></div>
         <div class="col-xs-2">
                <div id="Caissiier" style="color: green;">
                    <span id="function_user">foncUser</span> : <span id="name_user">nomUser</span>
               </div>
         </div>
         <form style="display:inline-block;" method="post" action="index.php" class="col-xs-1 login-form" >
              <input type="submit" name ="deconnexion"value="logOut" style="border:none;"/>
         </form>
         
   </div>
     
   </div>
   -->
    <!--   conteneur de caisse-->
   <div class="container-fluid" id="caisse" style="padding:0px;margin:0px;">  
      <section class="row" id="bodyCaisse" >
             <!--- calculatrice plus affichage article partie 1--->
               <div class=" col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4"  id="sales-cal-total">
                     <!---afficheur article--->
                        <!-- header table article -->
  
                       <!-- body table article -->                   
                         <div class="row"  id="body-article">
                                    <table class=" col-12 col-xs-12"  id="tableCaisse"  >
                                      <thead style="background-color: grey;" >
                                           <tr>
                                           <th>Item</th>
                                           <th>Prix unite</th>
                                           <th>Qty</th>
                                           <th>Amount</th>
                                            </tr>
                                      </thead>
                                         <tbody>
                                           
                                         </tbody> 
                                    </table>
                         </div>
  
                        <!-- total prix article -->
                     <div class="row " style="height:15%;" id="cntAffichTotal" >
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12  col-lg-12 "  id="affichTotal">
                          <div class="row" style="color: rgb(14, 241, 14);background-color: black;">
                               
                               <div class="col-3 col-xs-6 col-sm-6" style="border: 1px solid white;">Nbr.Art: <span id='nbrArtTot'> </span></div>
      
                               <div class="col-3 col-xs-6 col-sm-6" style="border: 1px solid white;">Total: <span id='priceTotal'></span></div>
                            
                               <div class="col-3 col-xs-6 col-sm-6" style="border: 1px solid white;">Payed: <span id='mounPayed'></span></div>
                               
                               <div class="col-3 col-xs-6 col-sm-6" style="border: 1px solid white;">Change: <span id="change"></span></div>
                          
                           </div>
                       </div>
                     </div>
                      <!---calculatrice--->
                     <div class="row" id = "calculator" style="background-color:gainsboro;height:40%;" >
                    
                        <div class="col-xs-12" id="calculatrice">
                               <!--- afficheur calculatrice--->
                           
                              <!--- clavier calculatrice--->
                           <div class="row"> 
                             <div class="col-12" id ="afficheur" style="background-color: black;border:2px solid white;color:rgb(14, 241, 14);font-size:20px;">
                             </div>
                              <div class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn " onclick="insert(7)">7</button></div> 
                              <div class="col-2 col-xs-2 col-sm-2 col-md-2"><button class="btn " onclick="insert(8)">8</button></div> 
                              <div class="col-2 col-xs-2 col-sm-2 col-md-2"><button class="btn "onclick="insert(9)">9</button></div> 
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn " onclick="insert('00')">00</button></div>                            
                              <div class="col-4 col-xs-4 col-sm-4 col-md-4"><button class="btn btn-primary quatrieme-button" >Input</button></div> 
                      
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(4)">4</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(5)">5</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(6)">6</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(0)">0 </button></div>
  
                              <div  class="col-4 col-xs-4 col-sm-4 col-md-4 "><button class="btn  quatrieme-button" onclick="back()"><-</button></div>
                      
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn " onclick="insert(1)">1</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(2)">2</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert(3)">3</button></div>
                              <div  class="col-2 col-xs-2 col-sm-2 col-md-2 "><button class="btn "onclick="insert('.')">.</button></div>
  
                              <div  class="col-4 col-xs-4 col-sm-4 col-md-4 "><button class="btn btn-primary quatrieme-button" id="clearCalculator">Clear </button></div>
                      
  
  
                           </div>
                        </div>
  
                     </div>
              </div>
               
  
  
   
                              <!---Produit partie 2 ---> 
                <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 " id="produit">
                              <!--- menu control  serveur + hide calcul + flesh left right--->
                     <div class="row" id="navADM" >
                         <div class="col-3 col-xs-3 col-sm-3 "><button id="hideCalculator">Hide calc<!--<img style="width:100%;height: 100%;" src="assets/images/param2.jpg">--></button></div>
                         <div class="col-3 col-xs-3 col-sm-3 "><button  id="hideTools" >Hide menu<!--<img style="width:100%;height: 100%;" src="assets/images/param.png">--></button ></div>
                         <div class="col-3 col-xs-3 col-sm-3 "><button   >Serveur<!--<input type="text" placeholder="search" id="searchProduct" style="width: 100%;">--></button ></div>
                         <div class="col-3 col-xs-3 col-sm-3 ">
                             <button style="padding: 0px;" > 
                                <select id="inputServeur"  style="display: inline-block; width: 100%;border:none;background-color: #efefef;">
                                @foreach($serveurs as $serveur)
                                 <option  value="{{$serveur->id }}">{{$serveur->nom}}</option>  
                                 @endforeach
                              </select>
                            </button>
                         </div>
                     </div> 
                                  <!--- menu category--->
                     <div class="row" id="nav" >
                            <!--
                             <div class="col-2 col-xs-3 col-sm-2 style="overflow:hidden;""><button id="all">All</button></div>
                             <div class="col-2 col-xs-3 col-sm-2 "><button id="coffe">Coffe</button></div>
                             <div class="col-2 col-xs-3 col-sm-2 "><button id="bouteille">Bouteille</button></div>
                             <div class="col-2 col-xs-3 col-sm-2 "><button id="gateaux">Gateaux</button></div>
                             <div class="col-2 col-xs-6 col-sm-2 "><button id="the">the</button></div>
                             <div class="col-2 col-xs-6 col-sm-2 " ><button style="padding: 0%;" id="jus">JUS</button></div>
                             -->
                             @foreach($categories as $category)
                             <div class="col-2 col-xs-2 col-sm-2" style="overflow:hidden;">
                                  <button id="{{$category->id}}">{{$category->name}}</button>
                             </div>
                             @endforeach
                             <div class="col-4 col-xs-4 col-sm-4" id="paginate_category">
                                 {{$categories->links()}}
                            </div>
                           
                     </div>
                                <!--- liste des produitd--->
                     <div class="row" id="article" style="justify-content: flex-start;align-content: flex-start;">     
                           
                           @foreach($products as $product)
                              <div class="col-2 col-xs-3 col-sm-2"  >
                                 <button style="overflow:hidden;" id='{{ $product->id }}' class='{{ $product->price }}'>{{ $product->name }}</button>
                              </div>
                           @endforeach
                           <div class="col-4 col-xs-12 col-sm-12" id="paginate_products">
                              {{$products->links()}}
                           </div>
                           
                     </div>   
                                 <!---menu control 2  cash + annuler +imptimer -->
                     <div class="row" id="controle">
                          <div class="col-2 col-xs-2 col-sm-2 "><button>a</button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button>b</button></div>
                          <div class="col-2 col-xs-2 col-sm-2 " ><button id="cash">cashd<!--<img style="width:100%;height: 100%;" src="public/images/cashd.png">--></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button  id='directCash'>cash<!--<img style="width:100%;height: 100%;" src="public/images/cash.png">--></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button id="clearItems">annuler<!--<img style="width:100%;height: 100%;" src="public/images/annuler.png">--></button></div>                       
                          <div class="col-2 col-xs-2 col-sm-2 "><button  id='validCommande' >imprimer<!-- <img style="width:100%;height: 100%;" src="public/images/imprimer.jpg">--></button></div>
  
                          <div class="col-2 col-xs-2 col-sm-2 " ><button style="background-color:white;" onclick="insert2(1)" ><img style="width:100%;height: 100%;" src="assets/images/1dinar.jpg"></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button style="background-color:white;" onclick="insert2(2)" ><img style="width:100%;height: 100%;" src="assets/images/2dinar.jpg"></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button style="background-color:white;" onclick="insert2(5)" ><img style="width:100%;height: 100%;" src="assets/images/5dinar.jpg"></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 " style="padding: 0px;"><button style="background-color:white;" onclick="insert2(10)" ><img style="width:100%;height: 100%;" src="assets/images/10dinar.jpg"></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button style="background-color:white;" onclick="insert2(20)" ><img style="width:100%;height: 100%;" src="assets/images/20dinar.jpg"></button></div>
                          <div class="col-2 col-xs-2 col-sm-2 "><button style="background-color:white;" onclick="insert2(50)"><img style="width:100%;height: 100%;" src="assets/images/50dinar.jpg"></button></div>
                     </div>
                    
                </div>
        </section>
  
   <!-- Button trigger modal -->
  <!-- Button trigger modal -->
  <dialog id="mydialog2" style="background-color:rgb(14, 241, 14);border:none;"> 
     <div class="row" >
         <div class="col-4 col-xs-4 col-sm-4 "><button style="font-size: 35px;font-weight: bold;color:red;" id='deleteItem'>X</button></div>
         <div class="col-4 col-xs-4 col-sm-4 "><button style="font-size: 35px;font-weight: bold;;color:green;" id='addItem'>+</button></div>
         <div class="col-4 col-xs-4 col-sm-4 "><button style="font-size: 35px;font-weight: bold;;color:green;" id='subItem'>-</button></div>
     </div>
     <div class="boutons">
         <button id="btnCloseModal2" > CLOSE</button>&nbsp;
     </div> 
  </dialog> 
  
  <!-- Modal -->
  <dialog id="mydialog" > 
      <div id="conteneurTicket" style="background-color: white;color:black;">
             <h3>L'ALBATROS</h3>
             <p>239 rue de rosny</br> montreuil</p>
             <div class="dasherbar"></div>
             <p id="dtimeTic"> 27/04/2018 22:18</p>
             <div class="dasherbar"></div>
             <table>
               <thead>
                   <tr>
                       <th>Désignation</th>   
                       <th>P.U</th>
                       <th>Qté</th>
                       <th>Tot.TTC</th>
                  </tr>
              </thead>
            <tbody>
            </tbody>
            </table>
            <div class="dasherbar"></div>
          <p>nombre d'article :  <span id="nbrArticleTicket"></span></p>
          <h4>NET TTC : <span id='totalTicket'></span> millimes</h4>
          <p>payed :  <span id="payedTicket"></span></p>
          <p>change :  <span id="changeTicket"></span></p>
          <p>phone number :  73007755</p>
       </div>
  
       <div class="boutons">
          <button id="btnCloseModal" > Print</button> 
          <button id="btnCancelModal" > Cancel Print</button>&nbsp;
       </div> 
  </dialog>  
  </div>
@endsection