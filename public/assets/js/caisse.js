
  function insert(num) {
    var aff = document.getElementById('afficheur');
         if( parseFloat( x = aff.innerText + num) > 1000){     
                 alert('mount must be equal or  under 1000');
                 aff.innerText ='';
                 return false;
          }   
  
          if((aff.innerText.split(".").length - 1) == 1 && num == '.' ){
                 return false;
          }
  
          if((aff.innerText.split(".").length - 1) ==1 ){
              pos = aff.innerText.indexOf(".");
              length = aff.innerText.length ;
              if(length - pos == 3 && num == '00'){
                      aff.innerText += '0';
                      return false;
                      
               }
              if(length - pos > 3){
                            return false;
              }
          }           
  
    if(num >= 10){ 
                   aff.innerText = num;
    }else if(aff.innerText.length == 1){
            if(aff.innerText == '0' && ( num = '.')){
                        aff.innerText += num;
              }else{
                        aff.innerText += num;
                  }      
    }else if(aff.innerText.length == 0 ){
                if(num == '0'){
                            aff.innerText = num;
                 }else if(num != '00' && num != '000' && num != '.' ){
                           aff.innerText = num;
                     }
    }else{
             aff.innerText += num;
         }
      
        
  
  }
  function insert2(num) {
    var aff = document.getElementById('afficheur');
                        aff.innerText = num;
  }
  function back(num) {
    var aff = document.getElementById('afficheur');
    aff1 = aff.innerText;
    //alert(aff1);
    
   // aff1.substring(0)
    document.getElementById('afficheur').innerText = aff1.substring(0,aff1.length-1);
  }


//*********************************************************************************
//*********************************************************************************
//*********************************************************************************
$(function () {
  $('#deleteItemModal').on('click',function () {
               // alert('hello');
                    addItems();
                      calculateSum();
                      clearCashChange();
   });
/*
  getAllCategory();
  getAllProduct ();
  ajaxPostArticleByCategory ("all", insertArticle);
  getAllServer ();
*/

  // remove Article
  $('#tableCaisse').on('click', 'tbody tr', function(event) { 
       $(this).addClass('highlight').siblings().removeClass('highlight');
       var $dialog = document.getElementById('mydialog2'); 
       $dialog.showModal(); 
       $('#btnCloseModal2').click(function(){
        var $dialog = document.getElementById('mydialog2'); 
        $dialog.close();       
   
       });
      
   });

   $('#clearCalculator').click(function (){
          $('#afficheur').text('');
    });



    // charge variable for use another time without recharge  
    var tableCaisse = $('#tableCaisse tbody');
    var clearItems = $('#clearItems') ;
   // var bodyArticle = $('#body-article') ;
   $('#deleteItem').click(function () {
       
       if( $('table > tbody > tr.highlight'))
       {
           $('table > tbody > tr.highlight').remove();   
           clearCalculator();
           clearCashChange();
           calculateSum();
           var $dialog = document.getElementById('mydialog2'); 
           $dialog.close(); 
       }else{
          alert('select Items before')
       }

    });
   //get data article her id, name and price and add to table if not exist in table
        //add article in table caisse if exist ** vérif quantity
        //var boutonArticle = $('#article  button');
        $('#article  ').on('click','button',function () {
       // var start = new Date().getTime();//alert(start);     // var end = new Date().getTime();//var time = end - start;//alert('Execution time: ' + time);    
            var nbrartAfficher =  parseInt($('#afficheur').text());
            if(nbrartAfficher > 1000 ){
                    alert('nombre d\'article trop grand ');
                    return
               }
          
            var nbrArtVaInsert ;
             var idArticle = $(this).attr('id');
     // var idArticle =3;
             var exist = false;
             
           if(isNaN(nbrartAfficher) || nbrartAfficher< 1 ){nbrArtVaInsert = 1;
              }else{ nbrArtVaInsert = nbrartAfficher;}
           
              $('#tableCaisse  tr').each(function() {
               if($(this).attr('id') == idArticle){
                  exist = true ;
                 //augmente nbr article
                  var nbrArtAInserer = parseInt($('td', this).eq(3).text());  
                  nbrArtAInserer += nbrArtVaInsert;
                  $('td', this).eq(3).text(nbrArtAInserer);
                  
                  var prixUnit = (parseFloat($('td', this).eq(2).text()));
                      //augmente amount article 
                  var prixTotal = parseFloat($('td', this).eq(4).text());  
                  nvPrixTotal = prixTotal + (nbrArtVaInsert * prixUnit);
                  $('td', this).eq(4).text(parseFloat(nvPrixTotal).toFixed(3));
                }            
               }); 
              /*if(exist == false){getArticle(idArticle,nbrArtVaInsert);}else{calculateSum();}*/ 
                // traitement if not exist in table caisse
                  if(exist == false){

                    idProduct = $(this).attr('id');
                    priceProduct = $(this).attr('class');
                    nameProduct = $(this).html();
                    priceTotal = nbrArtVaInsert * $(this).attr('class');
                      tableCaisse.append('<tr id="'
                      +idProduct+'"><td style="display:none;">'
                      +idProduct+'</td> <td>'+nameProduct+
                      '</td><td>'+parseFloat(priceProduct).toFixed(3)+
                      '</td><td>'+nbrArtVaInsert+'</td><td>'+parseFloat(priceTotal).toFixed(3)+
                      '</td></tr>');
                 calculateSum() ;

                   }else{calculateSum();}
                $('#afficheur').text(''); clearCashChange();         
      });
/*
    function getArticle(idArticlee,nbrInput) 
    {          
       var  table_article=[];
        sizee = table_article.length;
        for(var i = 0;i< sizee;i++)
         {
             if(table_article[i].id == idArticlee)
               {
                var prixTotal= ((table_article[i].prix) * nbrInput);
                 tableCaisse.append('<tr id="'+table_article[i].id+'"><td style="display:none;">'+table_article[i].id+'</td> <td>'+table_article[i].nom+'</td><td>'+parseFloat(table_article[i].prix).toFixed(3)+'</td><td>'+nbrInput+'</td><td>'+parseFloat(prixTotal).toFixed(3)+'</td></tr>');
                 calculateSum() ;
                }
         }
    }  
    */

                  function calculateSum() 
                  {
                        var total = 0;
                        var total2 = 0;
                        $('#tableCaisse tr').each(function() 
                         {
                            var value = parseFloat($('td', this).eq(3).text());
                            var value2 = parseFloat($('td', this).eq(4).text());
                            
                               if (!isNaN(value)) 
                                  {
                                   total += value;
                                  }
                              if (!isNaN(value2)) 
                                 {
                                   total2 += value2;
                                 }
                         });
                        if(total != 0){
                          $('#priceTotal').text(parseFloat(total2).toFixed(3));
                          $('#nbrArtTot').text(total);
                        }else{
                          $('#priceTotal').text('');
                          $('#nbrArtTot').text('');
                        }
                       
                      
                  }


       //augmente article quantity on click
      $('#addItem').click(function() {
                      addItems();
                      calculateSum();
                      clearCashChange();
             });
       $('#subItem').click(function() {
                      subItems();
                      calculateSum();
                      clearCashChange();
            });


           // augmenter le nbr de l'article plus amount 
      function addItems(){

        var qntArticle = parseInt($('table > tbody > tr.highlight > :eq(3)').html());
        var prixUnit = parseFloat($('table > tbody > tr.highlight > :eq(2)').html()).toFixed(3);
        var amount = parseFloat($('table > tbody > tr.highlight > :eq(4)').html()).toFixed(3); 
          if(!isNaN(qntArticle)){
            amount = parseFloat(parseFloat(amount) + parseFloat(prixUnit)).toFixed(3);
            qntArticle++;
            $('table > tbody > tr.highlight > :eq(3)').html(qntArticle);
            $('table > tbody > tr.highlight > :eq(4)').html(amount);
          }else{
            alert('selectionnez un produit en clicant sur lui pour que vous puissiez l\'augmenter');

          }
        
       }

           // diminuer le nbr de l'article plus amount 
function subItems()
       {
        // alert($('table > tbody > tr.highlight > :eq(3)').html());
        var qntArticle = parseInt($('table > tbody > tr.highlight > :eq(3)').html());
        if(!isNaN(qntArticle)){
           if(qntArticle >=2 ){
             var prixUnit = parseFloat($('table > tbody > tr.highlight > :eq(2)').html()).toFixed(3);
             var amount = parseFloat($('table > tbody > tr.highlight > :eq(4)').html()).toFixed(3); 
               //amount -= parseFloat(prixUnit).toFixed(3);
             
               amount = parseFloat(parseFloat(amount) - parseFloat(prixUnit)).toFixed(3);
              qntArticle--;
             $('table > tbody > tr.highlight > :eq(3)').html(qntArticle);
             $('table > tbody > tr.highlight > :eq(4)').html(amount);
        }else{
               alert('quantiy superior or equal to 1');
             }
            }else{
              alert('selectionnez un produit en clicant sur lui pour que vous puissiez le minimisez');

            }
            
      }

// payer cash
 $('#cash').click(function () {
                                cash();
                                clearCalculator() 
      });

     //set cash from client and get change
      function cash() 
      {
           var mountpayed = parseFloat($('#afficheur').text()).toFixed(3);
           var totalFacture = parseFloat($('#priceTotal').text()).toFixed(3); 
           
           if(isNaN(mountpayed)){
             alert('inset cash for pay')
           }else if(isNaN(totalFacture)){
            alert('inset Total')
           }else{
                    if((mountpayed - totalFacture) < 0 ){
                      alert('mount payed must be ground then total facture');
                    }else{
                      change = parseFloat((mountpayed - totalFacture)).toFixed(3) ;
                      $('#mounPayed').text(mountpayed);
                      $('#change').text(change);
                    }
           }
         
      }

         // payer cash 
      $('#directCash').click(function(){
               directCash();
      });

       // set cash equal to facture 
       // client payed cash equal to mount facture
      function directCash() 
      {
           var totalFacture =  parseFloat($('#priceTotal').text()).toFixed(3); 
            if(isNaN(totalFacture)){
            alert('inset Total facture')
           }else{
            $('#mounPayed').text(totalFacture);
            $('#change').text(0);
           }
         
      }


// clear items from table items
function clearCalculator() {
  $('#afficheur').text('');
}

clearItems.click(function clearItems() {
             // $('table tbody').html('');
              clearCalculator();
              clearAll();
         });
         
     //  clear data from table caisse , price facture, mount payed,
     //change and number article of commande  
  function clearAll() 
  {
         $('#tableCaisse tbody').text('');
         $('#nbrArtTot').text('');
         $('#mounPayed').text('');
         $('#change').text('');
         $('#priceTotal').text(''); 
  }
  // clear data from mount payed and change
   function clearCashChange() 
   {
       $('#mounPayed').text('');
       $('#change').text('');
   }


   $('#validCommande').click(function () {
    // $('#tableCaisse tbody').text('');
     var a = parseInt($('#nbrArtTot').text());
     var b = parseFloat($('#mounPayed').text());
     
     if(isNaN(a)){
                alert('inserez des article  SVP');
     }else if(isNaN(b) ){
                alert('inserez le montant payer SVP');
     }else{
             prepareFacture();
             saveCommand();
             clearAll();
             var $dialog = document.getElementById('mydialog'); 
             $dialog.showModal(); 
          }
     $('#btnCloseModal').click(function(){
            var $dialog = document.getElementById('mydialog'); 
            window.print();
            $dialog.close();       
       
           });
           $('#btnCancelModal').click(function(){
             var $dialog = document.getElementById('mydialog'); 
            
             $dialog.close();       
        
            });
     });
 
 
 
    //ticket items
   function prepareFacture(){  
 
     var listeArticle =$('#tableCaisse tbody ').html();
     var nbrArticle= $('#nbrArtTot').text();
     var totalFacture =  $('#priceTotal').text(); 
     var mountPayed = $('#mounPayed').text();
     var change = $('#change').text();
 
     var nbrArticleTicket = $('#nbrArticleTicket');
     var totalTicket = $('#totalTicket');
     var payedTicket = $('#payedTicket');
     var changeTicket = $('#changeTicket');
     var tbodyTicket = $('#conteneurTicket table tbody');
 
     tbodyTicket.html(''); 
     tbodyTicket.append(listeArticle); 
     nbrArticleTicket.text(nbrArticle);
     totalTicket.text(totalFacture);
     payedTicket.text(mountPayed);
     changeTicket.text(change);
   }
   // ptrepare table of objet article
    
   function saveCommand()
   { 
   
   var articletab=[];
       var commande = {
                       id_server: $('#inputServeur option:selected').attr('value'),
                       nbr_product: $('#nbrArtTot').text(),
                       total_facture : $('#priceTotal').text()
                    };
          
        $('#tableCaisse tbody tr').each(function() {
           articletab.push({
                            id: $('td', this).eq(0).text(),
                            quantity: $('td', this).eq(3).text()
                         });
     
               });
               var articletab = JSON.stringify(articletab);
               var commande = JSON.stringify(commande);/* ajaxSaveCommand (commande,articletab);alert(commande+' / '+articletab);*/
             savecommandeajaxlaravel(commande,articletab)
           
    } 
    // laravel save commandes
function savecommandeajaxlaravel(commande,articletab) {
  //var _token = $("input[name='_token']").val();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $("input[name='_token']").val()
    }
});
  $.ajax({
    url:"commandes",
    type:'POST',
    data:{commande:commande, articletab:articletab},
    success:function(data)
    {
           // $('#article').html(data);
           alert(data);
     }
});
}
// json table envoyer
function ajaxSaveCommand (commande,article) 
{
         var xhr = new XMLHttpRequest ();
       xhr.open('POST','index.php');
       var  commandeObject = commande;
       var  articlesArray = article; // id = encodeURIComponent(id);
       commandeObject = encodeURIComponent(commandeObject);
       articlesArray = encodeURIComponent(articlesArray);
     
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('commande=' + commandeObject +'&article=' + articlesArray);

       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {       
             // alert(xhr.responseText); 
            } 
      });
}; 

var table_article;
// get article by catégorie
function ajaxPostArticleByCategory (param, callback) 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','index.php');
       var  category = param;
       category = encodeURIComponent(category);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('category=' + category);
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {     
             //alert(xhr.responseText);
            var article = JSON.parse(xhr.responseText);
            table_article = article;
            callback(article);
            } 
      });
      delete xhr;
}; 

  
   // afficher artice dans div article 
   function insertArticle(tableArticle) 
   {
     $('#article').html('<img style="margin-left:50%;margin-top:200px;" src="public/images/wait2.gif">');
       size = tableArticle.length;
       $('#article').html(''); 
       for(var i = 0;i< size;i++){
           $('#article').append('<div class="col-2 col-xs-3 col-sm-2" style="overflow:hidden;" ><button  id='+tableArticle[i].id+'>'+tableArticle[i].nom+'</button></div>');
      }
   }

   // afficher category dans div category 
   function insertCategory(tableArticle) 
   {// size = tableArticle.length;
       $('#nav').html(''); 
       for(var i = 0;i< 6;i++){
           $('#nav').append('<div class="col-2 col-xs-3 col-sm-2 " style="overflow: hidden;"><button  id='+tableArticle[i].nomCategory+'>'+tableArticle[i].nomCategory+'</button></div>');
      }
   }
  
// get all article
var table_product;
function getAllProduct () 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','index.php');    
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('category=' + 'all');
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           { //alert(xhr.responseText);
             table_product = JSON.parse(xhr.responseText);
            } 
      });
      delete xhr;
}; 

function getAllServer () 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','index.php');    
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('allServer=' + 'all');
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {  //alert(xhr.responseText)
             //table_product = JSON.parse(xhr.responseText);
              var  f = JSON.parse(xhr.responseText);
            // size1 = tabCategory.length;
            //insertCategory(tabCategory);
            insertServer(f);
            } 
      });
      delete xhr;
};  
function insertServer(ta) 
{
 var  size = ta.length;
    $('#inputServeur').html(''); 
    for(var i = 0;i< size;i++){
        $('#inputServeur').append('<option value='+ta[i].idUser+'>'+ta[i].nomUser+'</optin>');
   }
}
function getAllCategory () 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','index.php');    
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('Allcategory=' + 'all');
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {  //alert(xhr.responseText) //table_product = JSON.parse(xhr.responseText);
             tabCategory = JSON.parse(xhr.responseText);
           
             size1 = tabCategory.length;
            insertCategory(tabCategory);
            } 
      });
      delete xhr;
}; 




   function localGetCategory(cat) 
   {
     size = table_product.length;
    
     
     $('#article').html('<img style="margin-left:50%;margin-top:200px;" src="public/images/wait2.gif">');

     if(cat == 'all'){
      $('#article').html(''); 
           for(var i = 0;i< size;i++){  
             $('#article').append('<div class="col-2 col-xs-3 col-sm-2 " style="overflow: hidden;"><button  id='+table_product[i].id+'>'+table_product[i].nom+'</button></div>');             
            // $('#article').append('<div class="col-2 col-xs-3 col-sm-2 " style="border:1px solid blue;text-align:center;" id='+table_product[i].id+'>'+table_product[i].nom+'</div>');             

            }
     }else{
      $('#article').html(''); 
            for(var i = 0;i< size;i++)
             {
               if(table_product[i].category == cat){
                 $('#article').append('<div class="col-2 col-xs-3 col-sm-2 "  style="overflow: hidden;"><button  id='+table_product[i].id+'>'+table_product[i].nom+'</button></div>');             
                }
               
             }
         }
      
   }
   
 
  
  
 // var categortyArray = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23'];
 var tabCategory;
 var size1;
  var begin = 0; 
  var end = 0 ; 
  var pas = 6;
  $('#categRigth').click(function () {
    testRigth(pas,size1,tabCategory);  //alert(tabCategory[1].nomCategory+''+size1); 

  });
  $('#categLeft').click(function () {
    testLeft(pas,tabCategory);
  });
 
   // category flesh right
 function testRigth(xpas,ysize, ztab)
 {
  if(!(end >= ysize || ysize <=xpas))
    {
       begin +=  xpas; end = begin + xpas;var i=begin;
       $('#nav').html('');
       while (i<end && i< ysize ) 
       {
             $('#nav').append(' <div class="col-2 col-xs-3 col-sm-2 " style="overflow: hidden;"><button id="'+ztab[i].nomCategory+'">'+ztab[i].nomCategory+'</button></div>');
                     i++;
       }
                            
    }
  }
  // category flesh left
 function testLeft(xpas, ztab)
  {
    if(begin > 0 ){
                    end = begin ;  begin -= xpas; 
                    $('#nav').html('');
                    for (var i = begin; i < end; i++) 
                    {
                      $('#nav').append(' <div class="col-2 col-xs-3 col-sm-2 " style="overflow: hidden;"><button id="'+ztab[i].nomCategory+'">'+ztab[i].nomCategory+'</button></div>');
                    }
                        
                  }             
  }

   

   
    $('#searchProduct').keyup(function() {
      // $('#show').html('a');//$('#show').html(a);
      if($('#searchProduct').val()==''){

        $('#article').html(''); var size = table_product.length;
        
        
        for(var i = 0;i< size;i++){   
          /*
          var div = document.createElement("div");
          var btn = document.createElement("button");
          div.style = "overflow: hidden";
          div.class = "col-2 col-xs-3 col-sm-2";
          btn.id = table_product[i].id;
          btn.innerText = table_product[i].nom;
          div.append(btn); $('#article').append(div);
        */
          $('#article').append('<div class="col-2 col-xs-3 col-sm-2" style="overflow: hidden;"  ><button  id='+table_product[i].id+'>'+table_product[i].nom+'</button></div>');             
         
        }
      }else{
        var a = $('#searchProduct').val();
       searchProduct(a);
      }
      
     });
     function inputAllProduct(){
      $('#article').html('');
      var size = table_product.length;
      for (var index = 0; index < size; index++)
       {
           $('#article').append('<div class="col-2 col-xs-3 col-sm-2 " ><button  id='+table_product[index].id+'>'+table_product[index].nom+'</button></div>');             
       } 
    }

function searchProduct(nomProduct){
   if(nomProduct.lenth>0){
     return
   }
  $('#article').html('');
  var size = table_product.length;
  for (var index = 0; index < size; index++)
   {
     if(sameString(nomProduct, table_product[index].nom)){
       $('#article').append('<div class="col-2 col-xs-3 col-sm-2 " ><button  id='+table_product[index].id+'>'+table_product[index].nom+'</button></div>');             
      }
    
   } 
}



function sameString(a, b){
  /*
  if (b.indexOf(a, 0) == -1) { return false;
}else{ return true;}
*/

  err=true;for(var i=0 ;i< a.length;i++){
           if(a[i] == b[i]){ 
     }else{
         // err++;i=100;
        err= false;
        }
   }
   return err;

   //var result = b.indexOf(a);
   
}
  //fin jquery        



  $('#hideTools').on('click',function () 
  {
     if( $('#bartools').css('display') == 'none'){
           $('#bartools').show(); $('#caisse').css('height','90%');
    }else{
         $('#bartools').hide(); $('#caisse').css('height','100%');
     }
  });
  
  $('#hideCalculator').on('click',function () 
  {
      if($('#calculator').css('display') == 'none'){
          $('#body-article').css('height','45%');
          $('#calculator').show();
     }else{
          $('#calculator').hide();
          $('#body-article').css('height','85%');
     }
  });

/*
 $('#nav ').on('click','button',function () {
                 localGetCategory($(this).attr('id'));
    });
*/
/* +---------------------------------------------
   | paginate caisse categories ajax
   | pagination des categories avec ajax
*/
     $('#nav').on('click', '#paginate_category  a', function(event){
      $('#nav').html('<img style="margin-left:50%;" src="assets/images/wait.gif">');

            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];

        $.ajax({
                 url:"caisse/categories_ajax?page="+page,
                 type:'GET',
                 data:"",
                success:function(data)
                {
                  $('#nav').html(data);
                }
       });
 
}); 

/* +---------------------------------------------
   | paginate caisse products ajax
   | pagination des article avec ajax
*/

$('#article').on('click', '#paginate_products a', function(event){
  $('#article').html('<img style="margin-left:50%;margin-top:100px;" src="assets/images/wait.gif">');

  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];

 $.ajax({
     url:"caisse/products_ajax?page="+page,
     type:'GET',
     data:"",
     success:function(data)
     {
             $('#article').html(data);
      }
 });
 
});

/* +---------------------------------------------
   |  // get products by category ajax laravel
   |
*/
  $("#nav").on('click', 'button', function(event){
    $('#article').html('<img style="margin-left:50%;margin-top:100px;" src="assets/images/wait.gif">');

     event.preventDefault(); 
     //var id = $(this).attr('id');
     var name = $(this).html();
      $.ajax({
        url:"caisse/"+name+"/products",
        type:'GET',
        data:"",
        success:function(data)
        { 
          $('#article').html(data);
         }
    });
 });



/* +---------------------------------------------
   | fin  paginate caisse products ajax
   |
*/
//fin jquery
});
 /*
function ajaxGet(id) {
    var req = new XMLHttpRequest();
    req.open("GET",'index.php?id='+id);
    req.send(null);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            // Appelle la fonction callback en lui passant la réponse de la requête
            alert(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    
}

 function ajaxPostArticle (param) 
  {
         var xhr = new XMLHttpRequest ();
         xhr.open('POST','index.php');
         //var  id = param;
         id = encodeURIComponent(param);
  
         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         xhr.send('id=' + id);
  
         xhr.addEventListener('readystatechange', function() {
             if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
             {      
              var article = JSON.parse(xhr.responseText);
             // insertArticle(article)
             alert(article);
              } else{
               // alert(xhr.status + " " + xhr.statusText);
            }
        });
  };

  */

//ajaxGet("http://localhost/tests/json/javascript-web-srv/data/langages.txt", afficher);


/*
var a =  document.getElementById('coffe');
a.addEventListener('click', function () {
  ajaxPostArticleByCategory ('the');
});
function ajaxPostArticleByCategory (param) 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','../index.php');
       var  category = param;
       if(param == 'cafe'){alert('cafe')}
       category = encodeURIComponent(category);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('category=' + category);
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {       
                alert(xhr.responseText);
           // var article = JSON.parse(xhr.responseText);
           // insertArticle(article);

            } else{
            }
      });
      delete xhr;
}; 

var b =  document.getElementById('all');
b.addEventListener('click', function () {
  $.get('../index.php?all=1', function(data) {
    //var article = JSON.parse(data);
//tableCaisse.append('<tr id="'+article.id+'"><td style="display:none;">'+article.id+'</td> <td>'+article.nom+'</td><td>'+article.prix+'</td><td>'+1+'</td><td>'+1000+'</td></tr>');
   alert(data);       
}); 
});

*/
/*
function ajaxPostAllArticle (param, callback) 
{
       var xhr = new XMLHttpRequest ();
       xhr.open('POST','../index.php');
       var  category = param;
      
       category = encodeURIComponent(category);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send('category=' + category);
       xhr.addEventListener('readystatechange', function() {
           if (xhr.readyState === XMLHttpRequest.DONE && (xhr.status === 200 || xhr.status === 0)) 
           {       
                //alert(xhr.responseText);
            var article = JSON.parse(xhr.responseText);
            //alert(article);
            //alert(article[0].id)
            callback(article);
            } else{
            }
      });
      delete xhr;
       };
       */


 /*
     alert('premier article '+articletab[0].id+' / '+articletab[0].quantity);
     alert('deuxième article '+articletab[1].id+' / '+articletab[1].quantity);
     alert('Commande: '+commande.idUser+' / '+commande.prixCommande+' / '+commande.nbnArtCommande);
  */
    // alert($('td', this).eq(3).text()); 
     /* var article = {
        id: $('td', this).eq(0).text(),
        quantity: $('td', this).eq(3).text()
               };*/
/*
               var article = {
                id: $('td', this).eq(0).text(),
                quantity: $('td', this).eq(3).text()
                       };*/
   /* alert(article.id+' / '+article.quantity);          
     var texteAvion = JSON.stringify(article);
     alert(texteAvion);
// Transforme la chaîne de caractères JSON en objet JavaScript
   alert(JSON.parse(texteAvion));
  */
  
//// JSON


//$('#all').click(function () {
  //ajaxPostArticle ('all');
 // $.get('../index.php?id=all', function(data) {
    //var reponse = data.split('|');
   // alert(data);
    //var amount = nbrInput * reponse[2] ;
    //tableCaisse.append('<tr id="'+reponse[0]+'"><td style="display:none;">'+reponse[0]+'</td> <td>'+reponse[1]+'</td><td>'+reponse[2]+'</td><td>'+nbrInput+'</td><td>'+amount+'</td></tr>');
    
 // });
//});
 

 // window.addEventListener('load', (event) => {
   //$('#article').html('<img src="../public/images/wait.gif">');
  //});
  //$('body button').click(function () {
   // $('#sound1').play();// alert('hello');// document.getElementById('sound1').play();
  //});
 /* function getArticle(idArticlee,nbrInput) {
    
       $.get('index.php?id='+idArticlee+'', function(data) {
         var reponse = data.split('|');
         var amount = nbrInput * reponse[2] ;
         tableCaisse.append('<tr id="'+reponse[0]+'"><td style="display:none;">'+reponse[0]+'</td> <td>'+reponse[1]+'</td><td>'+reponse[2]+'</td><td>'+nbrInput+'</td><td>'+amount+'</td></tr>');
         calculateSum() ;
       });
    */
   


/*
$('#all').click(function(){
 ajaxPostArticleByCategory ("all", insertArticle);

});
$('#coffe').click(function(){
  //ajaxPostArticleByCategory ("cof", insertArticle);
  localGetCategory("cof");
});

$('#bouteille').click(function(){
 // ajaxPostArticleByCategory ('bouteille', insertArticle);
  localGetCategory("bouteille");
});
$('#the').click(function(){
 // ajaxPostArticleByCategory ('the', insertArticle);
  localGetCategory('the');
});
$('#gateaux').click(function(){
 // ajaxPostArticleByCategory ('gateaux', insertArticle);
  localGetCategory("gateaux");
});
$('#jus').click(function(){
 // ajaxPostArticleByCategory ('jus', insertArticle);
  localGetCategory("jus");
});
*/
/*
$('#total').click(function () {
                               calculateSum();
                               clearCalculator();
         });
       // calculate amount facture
*/
