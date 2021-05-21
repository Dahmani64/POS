<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Commande,CommandeDetail, Serveur};

class CommandeController extends Controller
{

    public function index(Request $request)
    {
            $test1 = ''; 
            $idServer = '';
            /* +-------------------------+
            |all commande by date     |
            +-------------------------+  */
       $serveurs =  Serveur::all();
        $commandes =  Commande::paginate(1);
        $total_recette =  Commande::all()->sum('total_facture');
        return view('recette.index',compact('commandes','total_recette','test1','idServer','serveurs'));
     }
    
    public function recherche_date( $date)
     {
        $test1 = $date;
        $idServer = '';
        $serveurs =  Serveur::all();
        $commandes =  Commande::whereBetween('created_at',array($date.' 00:00:00', $date.' 23:59:59'))->paginate(1);
        $total_recette =  Commande::whereBetween('created_at',array($date.' 00:00:00', $date.' 23:59:59'))->sum('total_facture');
        return view('recette.index',compact('commandes','total_recette','test1','idServer','serveurs'));
     }

    public function recherche_date_user($idUser ,$date)
    {
       $test1 = $date;
       $idServer = $idUser;
       $serveurs =  Serveur::all();
       $commandes =  Commande::where([['serveur_id',$idUser],['created_at','>=',$date.' 00:00:00'],['created_at','<=',$date.' 23:59:59']])->paginate(1);
       $total_recette =  Commande::where([['serveur_id',$idUser],['created_at','>=',$date.' 00:00:00'],['created_at','<=',$date.' 23:59:59']])->sum('total_facture');
       return view('recette.index',compact('commandes','total_recette','test1','idServer','serveurs'));//$commandes =  Commande::where('id_user',$request->user_caissier_id)->paginate(5);// $total_recette =  Commande::where('id_user',$request->user_caissier_id)->sum('total_facture');
    }
    
    public function show($id)
    {
        /*
       if(isNan($id)){
        return view('404');
       }*/
         $commande = Commande::find($id);
        return view('recette.show',compact('commande'));
    }

    public function showAjax($id)
    {   
         $commande = Commande::find($id);
       // return view('recette.show',compact('commande')); 
       $b=[];  
      // return()  
       foreach($commande->commandes_details as $commande_detail)
           {
               $a =[
                'name'=>$commande_detail->product->name,
                'quantite'=> $commande_detail->quantite,
                'price_unit'=>$commande_detail->product->price,
                'total'=> $commande_detail->product->price * $commande_detail->quantite
               ];
               $b[]= $a;
            }
         //  echo $commande->total_facture;

           return response()->json($b);
    }

    public function store(Request $request)
    {
     // $user = auth()->user();$id = $user->id;
      if($request->json()){

      $commande = json_decode($request->commande, true);
      $commande_detail = json_decode($request->articletab, true); 
     $a =  Commande::create([
        'user_id' =>  auth()->user()->id, 
        'serveur_id' => $commande["id_server"], 
        'nbr_product' => $commande["nbr_product"],
        'total_facture' => $commande["total_facture"]
      ]);
          if($a){
            $size = count($commande_detail);
            for($i=0;$i<$size;$i++)
             {    $comd_detail = new CommandeDetail;
                  $comd_detail->quantite = $commande_detail[$i]["quantity"];
                  $comd_detail->commande_id = $a->id;
                  $comd_detail->product_id = $commande_detail[$i]["id"];
                  $comd_detail->save();
             }
          }
      
            return('date Saved success');
         
     }
          return abort(404);
   }
  }
